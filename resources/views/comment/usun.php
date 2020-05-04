<?php
    if(isset($_GET['id'])){
        
        try{
                require_once("connect.php");
                
                $polaczenie = new mysqli($host, $user, $password, $name);
                
                if($polaczenie->connect_errno != 0){
                    throw new Exception(mysqli_connect_error());
                }
                else{
                    
                    $id = $_GET['id'];
                    
                    if($polaczenie->query("UPDATE comentsyt SET banned=1 WHERE id='$id'"))
                    
                    $polaczenie->close();
                }
            }
            catch(Excample $error){
                echo "ERROR!";
            }
        
    }
    else{
        header('Location: index.php');
    }

    header('Location: index.php');
?>