<?php
    class View{
        public $viewName = NULL;
        public $data = array();
        public $tampilkan = FALSE;

        public function __construct($view)
        {
            $this->viewName = $view;
        }

        public function bind($name,$value=''){
            if(is_array($name)){
                foreach($name as $attr=>$val){
                    $this->data[$attr]=$val;
                }
            }else $this->data[$name] = $value;
        }

        public function runRender(){
            $this->tampilkan = TRUE;
            extract($this->data);
            $view = ROOT.DS.'modules'.DS.'views'.DS.$this->viewName.'.view.php';

            if(file_exists($view)) require_once $view;
            else echo "View tidak ditemukan";
        }

        public function __destruct()
        {
            if(! $this->tampilkan) $this->runRender();
        }

    }

?>