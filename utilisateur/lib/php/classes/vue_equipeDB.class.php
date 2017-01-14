<?php

class Vue_equipeDB {

    private $_db;
    private $_equipeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getListeEquipe($id) {
        try {
            $query = "SELECT * FROM vue_equipe where idequipe =:idpilote";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
    
    public function getVue_equipeById($id){
        try {
            $query = "SELECT * FROM vue_equipe where idequipe =:idpilote";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }

}