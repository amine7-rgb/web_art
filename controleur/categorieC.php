<?php

require_once "../config.php" ;
require_once "../model/categorie.php";

class categorieC {

    public function ajouterCategorie($categorie)
    {
        $sql = "INSERT INTO categorie (nom,type) 
        VALUES (:nom, :type)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom' => $categorie->getNom(),
                'type' => $categorie->getType()
                
                ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function afficherCategorie()
    {

        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function supprimerCategorie($id)
    {
        $sql = 'DELETE FROM categorie WHERE id = :id';
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

    function recupererCategorie($id){
        $sql='SELECT * from categorie where id =$id';
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
    
            $user=$query->fetch();
            return $user;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function modifierCategorie($categorie,$id)
    {
       try
       {
           $db = config::getConnexion();
                   $query = $db->prepare(
                       'UPDATE categorie SET 
                           nom = :nom,
                           type = :type 
                                                      
                       WHERE id = :id'
                   );
                   $query->execute([
                       'nom' => $categorie->getNom(),
                       'type' => $categorie->getType(),
                       
                       'id' => $id
                   ]);
                   echo $query->rowCount() . " records UPDATED successfully <br>";
       } 
       catch (PDOException $e)
        {
           $e->getMessage();
       }
    }



    function trierCategorie()
    {
        $sql = "SELECT * from categorie ORDER BY nom DESC";
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


    public function getcategoriebytype($type) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM categorie WHERE type = :type'
            );
            $query->execute([
                'type' => $type
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function recherche($search_value)
    {
        $sql="SELECT * FROM categorie where id like '$search_value' or nom like '%$search_value%' or type like '%$search_value%'  or id like '%$search_value%'  ";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }











}
?>