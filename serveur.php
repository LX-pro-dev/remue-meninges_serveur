<?php
include "functions.php";

var_dump($_GET);//affiche le contenu d'une variable ex :http://localhost/serveur.php?langue=fr&category=1 va afficher les infos correspondantes dans ma table. le ? correspond à la requête
 
//controle de réception de param
if(isset($_GET["operation"])){//operation REQUEST englobe ts les types de param, operation == param dans android à envoyer
   
    //demande de récupération de tous les profils
    if($_GET["operation"]=="tous"){//ou $_GET requete http (requete réseau)
        $langue=$_GET["langue"];//récupérer la langue choisie
        try{
          print ("tous%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
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
          print ("category%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
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
          print ("level%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
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
          print ("date%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
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
          print ("keyword%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
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
    
    
    //enregistrement nouveau profil
    elseif($_GET["operation"]=="enreg"){
         try{
             //récupération des données en post
             $lesdonnees =$_GET["lesdonnees"];//!mêmes noms à mettre dans android !!!POST? GET?
             var_dump($lesdonnees);

             //`langue`, `question`, `indice`, `reponse`, `category`, `level`
             $donnee= json_decode($lesdonnees);//décoder le json
             $langue=$donnee[0];
             $question=$donnee[1];
             $indice=$donnee[2];
             $reponse=$donnee[3];
             $category=$donnee[4];
             $level=$donnee[5];
            
                 
             // insersion dans la bd
             print("enreg%");
             $cnx= connexionPDO();
             $larequete = "insert into carte (langue,question,indice,reponse,category,level)";
             $larequete.="values('$langue','$question','$indice','$reponse',$category,$level)";
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();
             
             
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
    
    // demande de modification
    elseif($_GET["operation"]=="update"){
         try{
             //récupération des données en post
             $lesdonnees =$_GET["lesdonnees"];//format json de l'update! mêmes noms à mettre dans android PUT? GET?
             $donnee= json_decode($lesdonnees);//décoder le json rq : le premier indice du tableau contiendra l'id
             $id=$donnee[0];//recuperation de la PK !
             $langue=$donnee[1];
             $question=$donnee[2];
             $indice=$donnee[3];
             $reponse=$donnee[4];
             $category=$donnee[5];
             $level=$donnee[6];            
             // modification dans la bd
             print("update%");
             $cnx= connexionPDO();
             $larequete = "update from carte set langue = '$langue', question = '$question', indice = '$indice', reponse = '$reponse', category = $category, level = $level where id=$id";//on garde la date de creation sans sa maj?
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();
            
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
}
elseif(isset($_GET["operation"])){
    // demande de suppression
    if($_GET["operation"]=="del"){// ou $_DELETE ou $_GET["operation"]=="del"
         try{
             //récupération des données en post
             $id =$_GET["id"];//!mêmes noms à mettre dans android DELETE? GET?
             var_dump($id);             
             // suppression dans la bd
             print("del%");
             $cnx= connexionPDO();
             $larequete = " delete from carte where id=$id";
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();
            
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
}
?>