<?php

class DB {

        private $dbh;
        private $className;
    public function __construct() {
        $this->dbh = new PDO('mysql:dbname=qqq; host=domain.com', 'root' , 'root');


    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }


    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return   $sth->execute($params);
    }

//    public function queryAll($sql, $cl = 'stdClass') {
//        $res = mysql_query($sql);
//        if (false === $res) {
//            return FALSE;
//        }
//        $ret = [];
//        while ($row = mysql_fetch_object($res, $cl)) {
//            $ret [] = $row;
//        }
//        return $ret;
//    }
//    
//    public function queryOne($sql, $cl='stdClass'){
//        return $this->queryAll($sql, $cl)[0];
//        
//    }

}
