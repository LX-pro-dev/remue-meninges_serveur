<?php
include "functions.php";

var_dump($_REQUEST);//affiche le contenu d'une variable ex :http://localhost/serveur.php?langue=fr&category=1 va afficher les infos correspondantes dans ma table. le ? correspond à la requête
 
//controle de réception de param
if(isset($_REQUEST["operation"])){//operation REQUEST englobe ts les types de param, operation == param dans android à envoyer
    
    //enregistrement nouveau profil
    if($_REQUEST["operation"]=="enreg"){
         try{
             //récupération des données en post
             $lesdonnees =$REQUEST["lesdonnees"];//!mêmes noms à mettre dans android
             //`id`, `langue`, `question`, `indice`, `reponse`, `category`, `level`, `dateceration`
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
             $larequete = "insert into profil (langue,question,indice,reponse,category,level)";
             $larequete.="values($langue,$question,$indice,$reponse,$categroy,$level)";
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();
             
             
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }

    //demande de récupération de tous les profils
    elseif($_REQUEST["operation"]=="tous"){
        try{
          print ("tous%");//% pour pouvoir faire un split sur le String de retour et donc le découper facilement
            $cnx = connexionPDO();//créer la connexion en récupérant la connexion de l'appel de la fonction connexionPDO()
            $req = $cnx->prepare("select * from profil order by datecreation desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
            $req->execute();//exécuter la requete
            
            //récupération de tous les profils
            //tant qu'il y a un profil, récupération du premier puisque c'est le dernier
            while($ligne = $req ->fetch(PDO::FETCH_ASSOC)){//fetch lecture, fetch_assoc tableau associatif
                //on récupère dans ligne la lecture que l'on met dans un tab. si la ligne est null il sort du while
                $resultat[]=$ligne;
            }
            print(json_encode($resultat));//json_encode pour encoder le tableau en format json qui sera lu par android
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }

    // demande de suppression
    elseif($_REQUEST["operation"]=="del"){
         try{
             //récupération des données en post
             $lesdonnees =$REQUEST["lesdonnees"];//!mêmes noms à mettre dans android
             $donnee= json_decode($lesdonnees);//décoder le json
             $id=$donnee[0];//j'ai remplacé $datemesure de serveurcoach par id car les 2 corresondaient à la PK !
                          
             // suppression dans la bd
             print("del%");
             $cnx= connexionPDO();
             $larequete = " delete from profil where id=$id";
             print ($larequete);
             $req= $cnx->prepare($larequete);
             $req->execute();
            
        }catch(PDOException $e){
            print "Erreur !%".$e->getMessage();
            die();
        }
    }
    
    // demande de modification
    elseif($_REQUEST["operation"]=="update"){
         try{
             //récupération des données en post
             $lesdonnees =$REQUEST["lesdonnees"];//!mêmes noms à mettre dans android
             $donnee= json_decode($lesdonnees);//décoder le json
             $id=$donnee[0];//j'ai remplacé $datemesure de serveurcoach par id car les 2 corresondaient à la PK !
                          
             // modification dans la bd
             print("update%");
             $cnx= connexionPDO();
             $larequete = " update from profil where id=$id";
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