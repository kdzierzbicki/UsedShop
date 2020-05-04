<?php
    
    if(!isset($_POST['autor'])){
        header('Location: index.php');
        exit();
    }

    $nick = $_POST['autor'];
    $tresc = $_POST['tresc'];

    if(strlen($nick) == 0 || strlen($tresc) == 0){
        $_SESSION['blad'] = "Żadne pole nie może być puste!";
        header('Location: index.php');
    }
    else{
        
        require_once("connect.php");
        
        try{
            $polaczenie = new mysqli($host, $user, $password, $name);
            
            if($polaczenie->connect_errno != 0){
                throw new Exception(mysqli_connect_error());
            }
            else{
                
                mysqli_query($polaczenie, "SET CHARSET utf8");
                mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
                
                $data = date("d-m-Y | h:i:s");
                
                if($polaczenie->query("INSERT INTO comentsyt VALUE(NULL, '$tresc', '$nick', '$data', 0)")){
                    $_SESSION['wyslano'] = true;
                    header('Location: index.php');
                }
                else{
                    $_SESSION['blad'] = "Błąd podczas wysyłania kometarza!";
                    header('Location: index.php');
                }
                
                $polaczenie->close();
            }
            
        }
        catch(Exception $error){
            echo "Connection Error!";
        }
    }
?>