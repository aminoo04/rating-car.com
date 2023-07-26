<?php
echo("<table border='1'>
    <tr><th>Modèle</th><th>Sécurité</th><th>Conduite</th><th>Confort</th><th>Nbr tests</th></tr>");
$conn = mysqli_connect("localhost", "root", "", "testcar");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$req = "SELECT M.libelle, ROUND(AVG(E.securite), 2), ROUND(AVG(E.conduite), 2), ROUND(AVG(E.confort), 2), COUNT(T.numPermis) 
        FROM modelevoiture M, evaluation E, testeur T 
        WHERE E.numPermis=T.numPermis AND M.idModele=E.idModele 
        GROUP BY E.idModele";
$res = mysqli_query($conn, $req);
while ($t = mysqli_fetch_array($res)) {
    echo("<tr>");
    for ($i = 0; $i < 5; $i++) {
        echo("<td>" . $t[$i] . "</td>");
    }
    echo("</tr>");
}
echo("</table>");
mysqli_close($conn);
?>

