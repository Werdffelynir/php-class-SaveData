<?php
session_start();

/**
 * Class SaveData
 */
class SaveData{
	
	const SESNAME = "9faJgh3Utr3gZeGf437e57878Hd";
    public $safeMode = true;
    public $dataInFile = false;
    public $dataInFilePath;

    public $save = array();
	protected static $instance;

    private function __clone(){}
    private function __wakeup(){}

    /**
     * Типичный getInstance
     * @return SaveData
     */
    static public function start(){
        if (is_null(self::$instance))
            self::$instance = new self;
        return self::$instance;
    }

    /*
     * Типичный getInstance
     *
     * @param string $fileName
     * @return SaveData
     */
    static public function restore($type='session', $fileName=null){

        if($type != 'session')
        {
            $path = (is_null($fileName))?
                __DIR__.DIRECTORY_SEPARATOR.'basedump.savedata':
                $fileName;

            $saveObj = unserialize(file_get_contents($path));
        }
        else
        {
            $saveObj = unserialize($_SESSION[self::SESNAME]);
        }


        if (is_null(self::$instance))
            self::$instance = new self($saveObj);
        return self::$instance;
    }

    /**
     * @param null $saveData
     */
    private function __construct($saveData=null){
        if(!is_null($saveData)) 
			$this->save = $saveData;
    }

    /**
     * @param $title
     * @param $value
     * @param bool $ignoreSafeMode
     * @return $this
     */
    public function set($title, $value, $ignoreSafeMode=false){
	    
	    if($this->safeMode==true AND $ignoreSafeMode==true)
	    {
	        if (!isset($this->save[$title])){
	            $this->save[$title] = $value;
	        } else {
				try {
				    throw new Exception("Safe mode set TRUE.");
				} catch(Exception $e) {
				    echo "<div style='padding: 10px; font-family: Verdana; font-size: 11px; color:#B91300; background: #FFF4AF'>
				    <b style='font-size: 14px; color:#DD3724;'>Warning! This KEY = [' " .$title . " '] is exist!</b> where VALUE  = [' " .$value . " '].<br>
				    In file: ".$e->getFile(). "<br>
				    Line: " . $e->getLine()."<br>
				    Trace As String: <b>". $e->getTraceAsString() . "</b></div>";
				}
	        }
	    }else{
		    $this->save[$title] = $value;
	    }

        return $this;
    }

    /**
     * @param $title
     * @param null $ifIsNotExist
     * @return null
     */
    public function get($title, $ifIsNotExist = null){
        if ( is_null($ifIsNotExist) AND isset($this->save[$title]) )
            return$this->save[$title];
        else
            return $ifIsNotExist;  
    }

    /**
     * @return array|null
     */
    public function getAll(){
        return $this->save; 
    }

    /**
     * @return $this
     */
    public function save(){
	    session_unset($_SESSION[self::SESNAME]);
        $_SESSION[self::SESNAME] = serialize($this->save);
        return $this;
    }

    public function saveInFile($fileName=null){
        if($this->dataInFile)
        {
            $path = (is_null($fileName))?
                __DIR__.DIRECTORY_SEPARATOR.'basedump.savedata':
                $fileName;
            $this->dataInFilePath = $path;
            file_put_contents($path, serialize($this->save));
        }
        else
        {
            return false;
        }
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function remove($title){
	    unset($this->save[$title]);
	    $this->save();
	    return $this;
    }

    /**
     * @param bool $delete
     * @return $this
     */
    public function removeAll($delete=false){
        $this->save = array();
        if($delete)
        {
            session_unset($_SESSION[self::SESNAME]);
        }
        return $this;
    }
}

