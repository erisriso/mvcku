<?php
class Model{
    public $db;
    protected $tableName;

    public function __construct(){
        $this->db = new Database();
    }
    
    public function model($modelName){
        require_once ROOT.DS.'modules'.DS.'models'.DS.$modelName.'Model.php';

        $className = ucfirst($modelName).'Model';
        $this->$modelName = new $className;
    }

    public function get($params=""){
        $sql = "select * from ".$this->tableName;

        if(is_array($params)){
            if(isset($params["limit"])){
                $sql .=" limit ".$params['limit'];
            }
        }

        $this->db->query($sql);

        return $this->db->execute()->toObject();
    }

    public function getWhere($params){
        return $this->db->getWhere($this->tableName,$params)->toObject();
    }
}
?>