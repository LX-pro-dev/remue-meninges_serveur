<?php

include "functions.php";
 
//controle de réception de param
if(isset($_GET["operation"])){//operation REQUEST englobe ts les types de param, operation == param dans android à envoyer
    if(isset($_GET["langue"])){
    //demande de récupération de tous les profils
        if($_GET["operation"]=="tous"){//ou $_GET requete http (requete réseau)
            $langue=$_GET["langue"];//récupérer la langue choisie
            try{
              //print ("tous%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
                $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
                $req = $cnx->prepare("select * from carte where langue = '$langue' order by datecreation desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
                $req->execute();//exécuter la requete
                //récupération de tous les profils
                //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
                $resultat=[];
                while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                    //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                    $resultat[]= $ligne;
                }
                print(json_encode($resultat,JSON_UNESCAPED_UNICODE));//json_encode pour encoder le tableau en format json qui sera lu par android
                //echo json_last_error();//pour connaitre le code de l'erreur de json_encode
            }catch(PDOException $e){
                print "Erreur !%".$e->getMessage();
                die();
            }
        }

        elseif($_GET["operation"]=="category"){//ou $_GET requete http (requete réseau)
            $langue=$_GET["langue"];
            $category=$_GET["category"]; //récupérer la langue choisie et la category
            try{
              //print ("category%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
                $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
                $req = $cnx->prepare("select * from carte where langue = '$langue' and category = $category order by datecreation desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
                $req->execute();//exécuter la requete

                //récupération de tous les profils
                //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
                $resultat=[];
                while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                    //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                    $resultat[]=$ligne;
                }
                print(json_encode($resultat,JSON_UNESCAPED_UNICODE));//json_encode pour encoder le tableau en format json qui sera lu par android
            }catch(PDOException $e){
                print "Erreur !%".$e->getMessage();
                die();
            }
        }

        elseif($_GET["operation"]=="level"){//ou $_GET requete http (requete réseau)
            $langue=$_GET["langue"];
            $level=$_GET["level"];//récupérer la langue et le level
            try{
              //print ("level%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
                $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
                $req = $cnx->prepare("select * from carte where langue = '$langue' and level = $level order by datecreation desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
                $req->execute();//exécuter la requete

                //récupération de tous les profils
                //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
                $resultat=[];
                while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                    //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                    $resultat[]=$ligne;
                }
                print(json_encode($resultat,JSON_UNESCAPED_UNICODE));//json_encode pour encoder le tableau en format json qui sera lu par android
                //echo json_last_error();
            }catch(PDOException $e){
                print "Erreur !%".$e->getMessage();
                die();
            }
        }

        elseif($_GET["operation"]=="date"){//ou $_GET requete http (requete réseau)
            $langue=$_GET["langue"];
            $date=$_GET["datecreation"];//récupérer la langue choisie et la date????
            try{
              //print ("date%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
                $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
                $req = $cnx->prepare("SELECT * FROM carte WHERE langue = '$langue' and datecreation between \"$date\" and DATE_ADD(\"$date\",INTERVAL 1 DAY) order by datecreation desc");
                $req->execute();//exécuter la requete

                //récupération de tous les profils
                //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
                while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                    //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                    $resultat[]=$ligne;
                }
                print(json_encode($resultat,JSON_UNESCAPED_UNICODE));//json_encode pour encoder le tableau en format json qui sera lu par android
            }catch(PDOException $e){
                print "Erreur !%".$e->getMessage();
                die();
            }
        }

        elseif($_GET["operation"]=="keyword"){//ou $_GET requete http (requete réseau)
            $langue=$_GET["langue"];
            $keyword=$_GET["keyword"];//récupérer la langue choisie et le mot clé
            try{
              //print ("keyword%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
                $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
                $req = $cnx->prepare("select * from carte where langue = '$langue' and question like \"%$keyword%\" order by datecreation desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
                $req->execute();//exécuter la requete

                //récupération de tous les profils
                //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
                while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                    //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                    $resultat[]=$ligne;
                }
                print(json_encode($resultat,JSON_UNESCAPED_UNICODE));//json_encode pour encoder le tableau en format json qui sera lu par android
            }catch(PDOException $e){
                print "Erreur !%".$e->getMessage();
                die();
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD']=='PUT'){// demande de modification
    $_PUT = array();
    parse_str(file_get_contents("php://input"), $_PUT);
    foreach ($_PUT as $key => $value)
    {
        echo $key . " : " . $value;
    }
    
    if(isset($_PUT["lesmodifs"])){ 

        try{
             //récupération des données en post

             $lesdonnees =$_PUT["lesdonnees"];//format json de l'update! mêmes noms à mettre dans android PUT? GET?
             $donnee= json_decode($lesdonnees,JSON_UNESCAPED_UNICODE);//décoder le json rq : le premier indice du tableau contiendra l'id
             $id=$donnee["id"];//recuperation de la PK !
             $langue=$donnee["langue"];
             $question=$donnee["question"];//pb de gestion de simples cotes dans le text!
             $indice=$donnee["indice"];
             $reponse=$donnee["reponse"];
             $category=$donnee["category"];//faut-il le parser en int?
             $level=$donnee["level"];//faut-il le parser en int?intval(            
             // modification dans la bd
             //print("update%");
             $cnx= connexionPDO();
             $larequete = "update carte set langue = ".$cnx->quote($langue).
                 ", question = ".$cnx->quote($question).
                 ", indice = ".$cnx->quote($indice).
                 ", reponse = ".$cnx->quote($reponse).
                 ", category = ".$cnx->quote($category).
                 ", level = ".$cnx->quote($level).
                 " where id=".$cnx->quote($id).")";//on garde la date de creation sans sa maj?
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();

        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
}


if($_SERVER['REQUEST_METHOD']=='POST'){// demande de modification

    $donnee = retrieveJsonPostData();

    if(isset($donnee)){
	
        try{
         //récupération des données en post
         //$lesdonnees =$data;//!mêmes noms à mettre dans android !!!POST? GET?
         //`langue`, `question`, `indice`, `reponse`, `category`, `level`
         //$donnee= json_decode($lesdonnees,JSON_UNESCAPED_UNICODE);//décoder le json
	 
         $langue=$donnee["langue"];
         $question=$donnee["question"];//pb de gestion de simples cotes dans le text!
         $indice=$donnee["indice"];
         $reponse=$donnee["reponse"];
         $category=$donnee["category"];
         $level=$donnee["level"];


         // insersion dans la bd
         //print("enreg%");
         $cnx= connexionPDO();
         $larequete = "insert into carte (langue,question,indice,reponse,category,level) ";
         $larequete.="values(". $cnx->quote($langue).//$cnx->quote pr la gestion des cotes ds les text
             " ,". $cnx->quote($question).
             " ,". $cnx->quote($indice).
             " ,". $cnx->quote($reponse).
             " ,". $cnx->quote($category).
             " ,". $cnx->quote($level).")";
        
         print ($larequete);
         $req= $cnx->prepare($larequete);
        
         $req->execute();


        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
}      


if($_SERVER['REQUEST_METHOD']=='DELETE'){// demande de modification
    
    //if(isset($_DELETE["id"])){
        try{
             //récupération des données en post
             $id =$_GET["id"];//!mêmes noms à mettre dans android DELETE? GET?
             // suppression dans la bd
             //print("del%");
             $cnx= connexionPDO();
             $larequete = " delete from carte where id=".$cnx->quote($id);
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();

        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
  //  }
}

?>
