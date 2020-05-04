<?php

session_start();

?>

<!DOCTYPE HTML>

<html>
<head>

    <title>Komentarze</title>

    <link rel="stylesheet" type="text/css" href="shop/resources/css/style.css" />
</head>


<body>


<style>
    body {
        background-color: #cce6ff;
        color: #242523;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;

        height: 100vh;
        margin: 0;

    }


    }

    .links > a {
        color: #05606f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: #0068ff;
        text-transform: uppercase;
        text-align: center;
    }


</style>

<div id="kom" >Tutaj możesz zamieścić komentarz lub zadać pytanie.</div>

<br/>
<form action="wyslij.php" method="post">
    <input type="text" name="author" placeholder="Twój nick" /> <br/> <br/>
    <textarea name="treść" placeholder="Treść Komentarza"></textarea><br/>
    <input type="submit" value="Wyślij" style="color: #1d68a7;"/>

</form>

<?php

  if(isset($_SESSION['blad']) ) {

      echo '<div style="color: red; ">' .$_SESSION['blad'].'</div>';
      unset($_SESSION['blad']);
  }


   else if(isset($_SESSION['wyslano']) ) {

    echo '<div style="color: green; ">' .$_SESSION['wyslano'].'</div>';
    unset($_SESSION['wyslano']);
}




?>


<hr/>
<?php

try {
    require_once("connect.php");

 $polaczenie = new mysqli($host, $user, $password, $name);

 if($polaczenie->connect_errno != 0 ){

      throw new Exception(mysqli_connect_error());

    }

 else {

     mysqli_query($polaczenie, "SET CHARSET utf8");
     mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci' ");

     $sprawdz = $polaczenie->query("SELECT * FROM comentsyt ");

     if($sprawdz->num_rows > 0){

         $num = $sprawdz->num_rows;

         for($i = 0; $i < $num; $i += 1){
             if ($komentarz = $sprawdz = $polaczenie->query("SELECT * FROM comentsyt WHERE id= '$i'")){

                 $wiersz = $komentarz->fetch_assoc();

                 if ($wiersz['banned']==1 ){

                     continue;
                 }

                 echo '
                 <div class="komentarz">' .
                     $wiersz['autor'].'/'.
                     $wiersz['data'].'
                     <br/>'.$wiersz['tresc'].'
                 <a href="usun.php"> Usuń komentarz</a>
                 </div> ';
             }
         }
     }

     $polaczenie->close();

    }

}

catch(Excample $error){

    echo "ERROR";
}



?>

</body>


</html>

