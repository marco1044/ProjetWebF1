<?php

class AjoutCalendierManager extends AjoutDvd {

    private $_db;
    private $_IdRealisateur = array();
    private $_IdGenre = array();
    private $_Genre = array();
    private $_Realisateur = array();
    private $_IdSupport = array();
    private $_Support = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    // GENRE
    public function getGenreId() {
        try {

            $query = "SELECT idgenre FROM genre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdGenre[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdGenre;
    }

    public function getGenre() {
        try {

            $query = "SELECT genre FROM genre";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Genre[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Genre;
    }

    // REALISATEUR
    public function getRealId() {
        try {

            $query = "SELECT idreal FROM realisateur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdRealisateur[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdRealisateur;
    }

    public function getRealisateur() {
        try {

            $query = "SELECT nomreal FROM realisateur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Realisateur[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Realisateur;
    }

    // SUPPORT
    public function getSupportId() {
        try {

            $query = "SELECT idsupp FROM support";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdSupport[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdSupport;
    }

    public function getNomSupp() {
        try {

            $query = "SELECT nomsupp FROM support";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Support[] = new ajoutdvd($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Support;
    }

    public function adddvd(array $data) {

        $query = "select adddvd(:Titre_dvd, :Prix_dvd, :Genre_dvd, :Realisateur_dvd, :Support_dvd) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['Titre_dvd'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['Prix_dvd'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['Genre_dvd'], PDO::PARAM_INT);
            $statement->bindValue(4, $data['Realisateur_dvd'], PDO::PARAM_INT);
            $statement->bindValue(5, $data['Support_dvd'], PDO::PARAM_INT);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion : " . $e;
            $retour = 0;
            return $retour;
        }
    }

}
?>

