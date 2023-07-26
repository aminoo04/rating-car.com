<?php 
$num = $_POST["num"];
$l = $_POST["l"];
$s = $_POST["sec"];
$con = $_POST["conf"];
$c = $_POST["cond"];
$s = (int) $s;
$con = (int) $con;
$c = (int) $c;

mysql_connect("localhost", "root", "");
mysql_select_db("testcar");
$req="SELECT * FROM testeur WHERE numPermis='$num';";
$res=mysql_query($req);
if (mysql_num_rows($res) == 0) {
    echo "tu doit s'incrit ";
} else {
    $res=mysql_query("SELECT * FROM modelevoiture WHERE libelle='$l';");
    $i=mysql_fetch_array($res);
    
    $req="INSERT INTO evaluation VALUES ('$num','".$i["idModele"]."','$s','$c','$con');";
    mysql_query($req);
    echo "jawek bh mrc"; 
}
mysql_close();
?>
