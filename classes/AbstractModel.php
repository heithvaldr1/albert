<?php

namespace Application\Models;

abstract class AbstractModel
        //implements IModel
{


        protected static $table;
        protected $data = [];

    public function __set($k,$v)
    {
        $this->data[$k] = $v;

    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return $this->data[$k];
    }


    public static function getTable() {
            //return 'abstract';
            return static::$table;
        }

        public static function findAll()
        {
            $class = get_called_class();
            $sql = 'select * from ' . static::getTable();;
            $db = new DB();
            $db->setClassName($class);
            return $db->query($sql);
        }

        public static function findOne($id)
        {
            $class = get_called_class();
            $sql = 'select * from ' . static::$table . ' where id=:id';
            $db = new DB();
            $db->setClassName($class);
            return $db->query($sql, [':id' =>  $id]);
        }

    public static function findOneByTheme($theme)
    {
        $class = get_called_class();
        $sql = 'select * from ' . static::$table . ' where theme LIKE :theme';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':theme' =>  $theme]);
    }

   
    
    public function insert()
    {
        $cols = array_keys($this->data);
        //var_dump($cols); die;
        foreach ($cols as $col){
            $data[':' . $col] = $this->data[$col];
        }

      //  var_dump($ins);

        $sql = 'INSERT INTO ' . static::$table . '
        (' . implode(', ', $cols).')
        VALUES
         (' . implode(', ', array_keys($data)).')';


        
        $db = new DB();
        $db->execute ($sql, $data);
    }
}
