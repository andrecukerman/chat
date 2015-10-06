<?php
class Db {
    private $db;
    private static $_instance = null;
    private function __construct() {
        $setting = parse_ini_file('database.ini');
        $mysqli = new mysqli($setting['host'], $setting['name'], $setting['password'], $setting['nameDatabase']);
        $mysqli->set_charset("utf8");
        $this->db = $mysqli;
    }
    protected function __clone (){}
    public static function getInstance (){
        if (is_null(self::$_instance)){
            return self::$_instance = new self();
        }else{
            return self::$_instance;
        }
    }

    public function getAll($query)
    {
        $arr = array();
        $result = $this->db->query($query);
        while ($row = $result->fetch_array(MYSQL_ASSOC)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function getLastMsg($data){

        return $this->getAll("SELECT msg, name, datetime FROM messages WHERE datetime > '".$data."'");
    }
    
    public function query ($str_query){

        return $this->db->query($str_query)->fetch_assoc();
    }

    public function insert($data){
        $name = $data['name'];
        $msg = $data['msg'];
        $sql = "INSERT INTO messages VALUES ('null','$msg','$name',null)";
        $this->db->query($sql);
    }
}