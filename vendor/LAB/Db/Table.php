<?php

namespace LAB\Db;

abstract class Table {
   
    protected $db;
    
    abstract protected function _insert(array$data);
    abstract protected function _update(array$data);
    
    public function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function save(array $data) {
        if (!isset($data['id'])) {
            return $this->_insert($data);
        } else {
            return $this->_update($data);
        }
    }
    
    public function find($id) {
        $stmt = $this->db->prepare("select * from " . $this->table . " where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("delete from " . $this->table . " where id=:id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
        //return true;
    }
    
    public function fetchAll() {
         $stmt = $this->db->prepare("select * from " . $this->table . "");
         $stmt->execute();
        return $stmt->fetchAll();
    }
}
