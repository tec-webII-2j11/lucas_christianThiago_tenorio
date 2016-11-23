<?php

session_start();

$mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");

$sql = "select nome, nivel from usuario where nome = '" .  $_POST["nick"] . "'";

$query = mysqli_query($mysqli, $sql);

if($query->num_rows == 0)
{


    if(isset($_FILES['avatar']) && ($_FILES["avatar"]["type"] == "image/jpeg"))
    {

        $uploaddir = 'images/perfil/';
        $uploadfile = $uploaddir . "fotoPerfil_" . basename($_POST['nick']) . ".jpg";
        
        
        
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
        

            list($width, $height) = getimagesize($uploadfile);
            $thumb = imagecreatetruecolor(137, 137);
            $source = imagecreatefromjpeg($uploadfile);
            imagecopyresampled( $thumb , $source , 0 , 0 , 0 , 0, 137, 137 , $width, $height );
            
            imagejpeg($thumb, $uploadfile, 100); 
             
        } 
        else 
        {
             echo "<script> alert('Problema no upload. Verifique se o arquivo é JPEG!'); </script>";
        }
        
        $mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");
        
        $sql = 'INSERT INTO usuario (nivel, nome, senha, tem_foto) values(?,?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $nivel = "usuario";
        $tem_foto = 1;
        $pass = md5($_POST["pass"]);
        $stmt->bind_param("sssi", $nivel, $_POST["nick"], $pass, $tem_foto);
        
        if($stmt->execute())
        {
            echo "<script> alert('Cadastro efetuado com sucesso!') </script>";
            
            $_SESSION["foto_perfil"] = $uploaddir . "fotoPerfil_" . $_POST['nick'] .  ".jpg";
            $_SESSION["nickname"] = $_POST["nick"];
            $_SESSION["nivel"] = "usuario";
            
            require("index.php");
            
        }
    }
    else
    {
        if($_FILES["avatar"]["type"] != "image/jpeg")
        {
            echo "<script> alert('O arquivo precisa ser JPEG!') </script>";
            require("index.php");
            exit(0);
        }

     
        $mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");
        
        $sql = 'INSERT INTO usuario (nivel, nome, senha, tem_foto) values(?,?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $nivel = "usuario";
        $tem_foto = 0;
        $pass = md5($_POST["pass"]);
        $stmt->bind_param("sssi", $nivel, $_POST["nick"], $pass, $tem_foto);
       
        if($stmt->execute())
        {
            echo "<script> alert('Cadastro efetuado com sucesso!') </script>";
            
            session_start();
        
            $_SESSION["foto_perfil"] = "images/perfil/" . "brown-man-icon" . ".png";
            $_SESSION["nickname"] = $_POST["nick"];
            $_SESSION["nivel"] = "usuario";
            
        
            require("index.php");
        }
    }
    
}
else
{
        $mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");
    
        $sql = "select nome, senha, nivel from usuario where nome = '" . $_POST["nick"] . "' and senha = '" . md5($_POST["pass"]) . "'";
        
        $query = mysqli_query($mysqli, $sql);

        if($query->num_rows == 0) 
        {
            echo "<script> alert('Esse Nickname já existe, porém a senha está incorreta!!') </script>";
            require("index.php");
        }
        else
        {
            $query = mysqli_query($mysqli, $sql);
            
            $queryAssoc = mysqli_fetch_assoc($query);
 
            $nivel = $queryAssoc["nivel"];
            
            echo "<script> alert('Logado com sucesso. ') </script>"; 
            
            if($queryAssoc["tem_foto"] != "0")
            {
                 $_SESSION["foto_perfil"] = "images/perfil/" . "fotoPerfil_" . $_POST['nick'] . ".jpg";
            }
            else
            {
                 $_SESSION["foto_perfil"] = "images/perfil/" . "brown-man-icon" . ".png";
            }
            $_SESSION["nickname"] = $queryAssoc["nome"];
            $_SESSION["nivel"] = $nivel;
    
            require("index.php");
        }
}


?>
