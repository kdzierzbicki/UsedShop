<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Komentarze Online</title>
    </head>
    <body>

<button>
    <div class ="links">
        <a href="/shop/public">Strona Główna</a>

    </div> </button>

    <form action="wyslij.php" method="post">
            <input type="text" name="autor" placeholder="Twój nick"/> <br/>
            <textarea name="tresc" placeholder="Treść kometarza"></textarea><br/>
            <input type="submit" value="Wyślij"/>
        </form>
        <?php
            if(isset($_SESSION['blad'])){
                echo '<div style="color: red;">'.$_SESSION['blad'].'</div>';
                unset($_SESSION['blad']);
            }
            else if(isset($_SESSION['wyslano'])){
                echo '<div style="color: green;">'.$_SESSION['wyslano'].'</div>';
                unset($_SESSION['wyslano']);
            }
        ?>
        <hr/>
        <?php
            
            try{
                require_once("connect.php");
                
                $polaczenie = new mysqli($host, $user, $password, $name);
                
                if($polaczenie->connect_errno != 0){
                    throw new Exception(mysqli_connect_error());
                }
                else{
                    
                    mysqli_query($polaczenie, "SET CHARSET utf8");
                    mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
                    
                    $sprawdz = $polaczenie->query("SELECT * FROM comentsyt");
                    
                    if($sprawdz->num_rows > 0){
                        $num = $sprawdz->num_rows+1;
                        
                        for($i = 1; $i < $num; $i += 1){
                            if($komentarz = $sprawdz = $polaczenie->query("SELECT * FROM comentsyt WHERE id='$i'")){
                                $wiersz = $komentarz->fetch_assoc();
                                
                                if($wiersz['banned']==1){
                                    continue;
                                }
                                
                                echo '
                                <div class="komentarz">'.
                                    $wiersz['autor'].' / '.
                                    $wiersz['data'].'
                                    <br/>'.$wiersz['tresc'].'
                                    <a href="usun.php?id='.$i.'">Usuń komentarz</a>
                                    </div>
                                    <br/>
                                ';
                                
                            }
                        }
                    }
                    
                    $polaczenie->close();
                }
            }
            catch(Excample $error){
                echo "ERROR!";
            }
            
        ?>
    </body>
</html>