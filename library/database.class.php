<?php
class Database{
    private $instance;
    private $sql;

    public function __construct(){
        require_once ROOT.DS.'library'.DS.'resultset.class.php';
        $this->instance = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        if(mysqli_connect_errno()){
            echo "Gagal koneksi ke database: ".mysqli_connect_error();
        }
    }

    public function query($sql){
        $this->sql=$sql;
    }

    public function semuaData($tableName){
        $this->sql = "select * from ".$tableName;
        return $this->execute();
    }

    public function execute(){
        $query = mysqli_query($this->instance,$this->sql);
        return new ResultSet($query);
    }
    
    public function getWhere($tableName,$where = array()){
        $this->sql = "select * from ".$tableName;

        if(is_array($where)){
            $this->sql .= " where ";
            $x=0;
            foreach($where as $key=>$value){
                $x++;
                $this->sql .= $key . "='" .$value . "' ";

                if($x<count($where)) $this->sql .= " and ";
            }
        }

        return $this->execute();
    }
}

?>