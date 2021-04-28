<?php

class categorie
{
 private $id;
 private  $nom ;
 private  $type ;
 

function __construct ($nom , $type)

{
    $this->nom =$nom;
    $this->type =$type ;
        
}

function  getID()
{ return $this->id; }

function  getNom()
{ return $this->nom; }

function  getType()
{ return $this->type; }


function setId(int $id):int
{
    return $this->Id=$id;
}

function setNom(int $nom ):string
{return $this->nom =$nom ;}

function setType(string $type):string
{
    return $this->type=$type;
}

}

?>