<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
      function verif(x){
        test=true 
        if (x.length!=8 || x.indexOf("/")!=2){
          test=false
        }
        else{
          s1=x.substr(0,1)
          s2=x.substr(3)
          if(isNaN(s1)==true || isNaN(s2)==true){
            test=false
          }
        }
        return test

      }
      function verif1(){
        num=document.getElementById("num").value
        n=document.getElementById("n").value
        p=document.getElementById("p").value
        c1=document.getElementById("f"). checked
        c2=document.getElementById("m").checked
        
        if (verif(num)==false){
          alert("N° permis est invalide")
          return false
        }
        if (20<=n.length || n.length<=3 ){
          alert("il y a problem dans le nom")
          return false
        }
        if (20<=p.length || p.length<=3 ){
          alert("il y a problem dansle prenom")
          return false
        }
        if (c1==c2){
          alert("choisissez votre genre")
          return false
        }
      }


    </script>
</head>
<body>
<?php 
$p=$_POST["permis"];
$conn = mysqli_connect("localhost", "root", "", "testcar");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$req = "SELECT *FROM testeur WHERE numPermis = '$p' ";
        
$res = mysqli_query($conn, $req);
if (mysqli_num_rows($res) == 0){
    echo "il n y a pas c permis";
}
else{
$t = mysqli_fetch_array($res)
?>

  <form method="POST" onsubmit="return verif1()" action="change.php" name="f10">
    <fieldset name="g1" >N° Permis :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input readonly="readonly" name="lol" type="text"  value="<?php echo ($t[0]); ?>"> <br>
      <br>
      Nom
      :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input size="30" name="n" type="text" id="n" value="<?php echo ($t[1]); ?>"  ><br>
      <br>
      Prenom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input id="p" size="30" name="p" type="text" value="<?php echo ($t[2]); ?>"><br>
      <br>
      Genre
      :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="genre" id="f" value="F" <?php if($t[3]=="F"){echo "checked='checked'"; } ?>> Femme
      <input type="radio" name="genre" id="m" value="M" <?php if($t[3]=="M"){echo "checked='checked'";} ?>> Homme<br>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp;&nbsp; &nbsp;&nbsp; <input value="Annuler" name="ann" type="reset">&nbsp;&nbsp; 
      <input value="Ajouter" name="env" type="submit" ><br><legend>Modifier d'un testeur</legend></fieldset></form><p><br></p>

           
  </form>
</body>
</html>







<?php } ?>



