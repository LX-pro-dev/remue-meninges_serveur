<?php
function connexionPDO(){
  $login ="root";
  $mdp="";
  $bd="remue_meninges";
  $serveur="localhost";
    try{
        $conn=new PDO("mysql:host=$serveur;port=3306;dbname=$bd",$login,$mdp);//pour se connecter à la bd
        return $conn;
    }catch(PDOException $e){
        print $e;
        print "Erreur de connexion PDO";
        die();//== return null
    }
}
?>