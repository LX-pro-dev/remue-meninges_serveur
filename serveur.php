<?php
include "fonctions.php";

//controle de réception de param
if(isset($_REQUEST["operation"])){//operation REQUEST englobe ts les types de param, operation == param dans android à envoyer
    
    //enregistrement nouveau profil
    if($_REQUEST["operation"]=="enreg"){
         try{
             //récupération des données en post
             $lesdonnees =$REQUEST["lesdonnees"];//!mêmes noms à mettre dans android
             $donnee= json_decode($lesdonnees);//décoder le json
             $datemesure=$donnee[0];
             $poids=$donnee[1];
             $taille=$donnee[2];
             $age=$donnee[3];
             $sexe=$donnee[4];
             
             // insersion dans la bd
             print("enreg%");
             $cnx= connexionPDO();
             $larequete = "insert into profil (datemesure,poids,taille,age,sexe)";
             $larequete.="values(\"$datemesure\",$poids,$taille,$age,$sexe)";
             //$larequete .="values(NOW(),$poids,$taille,$age,$sexe)";
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
            $req = $cnx->prepare("select * from profil order by datemesure desc");//aller sur l'objet connexion et exécuter la méthode prepare qui attend une requete SQL et on veut récupérer dans l'ordre décroissant
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
             $datemesure=$donnee[0];
                          
             // suppression dans la bd
             print("del%");
             $cnx= connexionPDO();
             $larequete = " delete from profil where datemesure=\"$datemesure\"";
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