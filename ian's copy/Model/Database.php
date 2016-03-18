<?php 
class Database
{
	public $conn;
	public $dbaname ="test";
	public $username = "root";
	public $password = "ian";
	public $host = "localhost";
	public function __construct()
	{
	  $this->conn = mysql_connect($this->host,$this->username,
	  	$this->password);
	  if(!$this->conn){
        die("Errorcode: 402" . mysql_errno());
	  }
	  mysql_select_db($this->dbname,$this->conn);
	}
    public function fetch($sql)
    {
         $arr = array();
         $res = mysql_query($sql,$this->conn) or die(mysql_errno());
         while ($row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
         }
         mysql_free_result($res);
         return $arr;
    }
    public function execute($sql)
    {
        $res = mysql_query($sql,$this->conn) or die(mysql_errno());         
        if(mysql_affected_rows($this->conn) > 0){
        return ture;
        }else{
            return false;
        }
    }
    public function close_connect()
    {
    	if(!empty($this->conn)){
    		mysql_close($this->conn);
    	}
    }
}
?>