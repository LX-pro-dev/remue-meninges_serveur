<?php
function connexionPDO(){
  $login ="alexdev";
  $mdp="alexdev";
  $bd="remue_meninges";
  $serveur="localhost";
    try{
        $conn=new PDO("mysql:host=$serveur;port=3306;dbname=$bd;charset=utf8",$login,$mdp);//pour se connecter à la bd
        return $conn;
    }catch(PDOException $e){
        print $e;
        print "Erreur de connexion PDO";
        die();//== return null
    }
}

  /**
   * Returns the JSON encoded POST data, if any, as an object.
   * 
   * @return Object|null
   */
function retrieveJsonPostData()
  {
    // get the raw POST data
    $rawData = file_get_contents("php://input");

    // this returns null if not valid json
    return json_decode($rawData, JSON_UNESCAPED_UNICODE);
  }

?>
