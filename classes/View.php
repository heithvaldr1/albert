<?php

class View {

    public $m = [];
    //public $view;

//    public function __set($i,$k){
//        $this->m[$i] = $k;
//        
//    }

    
    public function set($i,$k){
        $this->m[$i] = $k;
        
    }

    public function display($param) {
        
        foreach ($this->m as $key=>$val){
            $$key = $val;
           //var_dump($m); 
        }
        
        
        include __DIR__ . '/../views/' . $param;  
        
    }

}
