<?php

class produit{
	
    private $type;
    private  $prix;
    private  $capacite;
    private  $datefin;


    
    function __construct($type,$prix,$capacite,$datefin){

        $this->type=$type;
        $this->prix=$prix;
        $this->capacite=$capacite;
        $this->datefin=$datefin;

    }


    function gettype()
    {
        return $this->type;
    }
    function getprix(){
        return $this->prix;
    }
    function getcapacite(){
        return $this->capacite;
    }
    function getdatefin(){
        return $this->datefin;
    }



    function settype($type){
        $this->type=$type;

    }
    function setprix($prix){
        $this->prix=$prix;
    }
    function setcapacite($capacite){
        $this->capacite=$capacite;
    }
    function setdatefin($datefin){
        $this->datefin=$datefin;
    }

}



?>