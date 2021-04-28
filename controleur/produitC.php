<?php

require_once "../config.php" ;
require_once "../model/produit.php";

class produitC {

    public function ajouterProduit($produit)
    {
        $sql = "INSERT INTO produit (Type, Prix, Capacite, DateFin) 
        VALUES (:Type, :Prix, :Capacite, :DateFin)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'Type' => $produit->getType(),
                'Prix' => $produit->getPrix(),
                'Capacite' => $produit->getCapacite(),
                'DateFin' => $produit->getDateFin()
                
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherProduit()
    {

        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function supprimerProduit($id)
    {
        $sql = 'DELETE FROM produit WHERE id = :id';
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
/*    public function modifierEmploye($produit, $id)
    {
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare(
                'UPDATE produit SET 
                        Type = :type, 
                        Prix= :prix,
                        Capacite = :capacite,
                        DateFin = :datefin
                        
                    WHERE Id = :id'
            );
            $query->execute([
                'id' =>  $id,
                'type' => $employe->getType(),
                'prix' => $employe->getPrix(),
                'capacite' => $employe->getCapacite(),
                'datefin' => $employe->getDateFin()                             
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
*/
/*
    public function recupererProduit($id)
    {
        $sql = "SELECT * from produit where Id=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    */




    function trierproduit()
    {
        $sql = "SELECT * from produit ORDER BY prix DESC";
        $db = config::getConnexion();
        try {
            $req = $db->query($sql);
            return $req;
        } 
        catch (Exception $e)
         {
            die('Erreur: ' . $e->getMessage());
        }
    }



    public function rechercherProduit($type) {            
        $sql = "SELECT * from produit where type=:type"; 
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $produit->getType(),
            ]); 
            $result = $query->fetchAll(); 
            return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getproduitbytype($type) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM produit WHERE type = :type'
            );
            $query->execute([
                'type' => $type
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function modifierproduit($produit, $id){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE produit SET 
                    type = :type,
                    prix = :prix, 
                    capacite = :capacite,
                    datefin = :datefin

                WHERE id = :id"
            );
            $query->execute([
                'type' => $produit->gettype(),
                'prix' => $produit->getprix(),
                'capacite' => $produit->getcapacite(),
                'datefin' => $produit->getdatefin(),
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererproduit($id){
        $sql="SELECT * from produit where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $air=$query->fetch();
            return $air;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



















}
?>