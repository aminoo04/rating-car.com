<?php

$num = $_POST["lol"];
$n = $_POST["n"];
$p = $_POST["p"];
$g = $_POST["genre"];

echo $num." ".$n." ".$p." ".$g." ";


mysql_connect("localhost", "root","");
mysql_select_db("testcar");
mysql_query("UPDATE testeur SET nom = '$n', prenom = '$p', genre = '$g' WHERE numPermis = '$num'");

echo"cbon";
?>
