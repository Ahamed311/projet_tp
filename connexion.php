<?php
 $hostname= "localhost";//adress du serveur mysql
 $username= "root";//nom dutlisateur
 $password= "";//mot de passe msql
 $database= "bd_epp-2024";//nom de la base de donnee 

 //connexion a la base de donnes 
 $connexion = mysqli_connect($hostname,$username,$password,$database);

 //verification de la connexion 

 if(!$connexion)
 {
    echo "connexion echoue";
 }
 
 
 
?>