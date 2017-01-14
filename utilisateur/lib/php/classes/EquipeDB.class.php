<?php

class EquipeDB extends Equipes {

    private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getEquipes() {
        try {
            $query = "SELECT * FROM equipes";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Equipes($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }

}
