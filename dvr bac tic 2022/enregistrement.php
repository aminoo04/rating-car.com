<?php 
$num = $_POST["num"];
$n = $_POST["n"];
$p = $_POST["p"];
$g = $_POST["genre"];
if($g=="homme"){
    $g='M';
}
else{
    $g="F";
}
mysql_connect("localhost", "root", "");
mysql_select_db("testcar");

$req = "INSERT INTO testeur (numPermis, nom, prenom, genre) VALUES ('$num','$n','$p','$g')";

mysql_query($req);

if (mysql_affected_rows() == 0) {
    echo "Le numéro de permis est déjà utilisé.";
} else {
    echo "Votre inscription a été effectuée avec succès."; 
}

?>