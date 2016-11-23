<?php
$mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");
        
        $sql = 'delete from comentario where comentario_id = ?';
        $stmt = $mysqli->prepare($sql);
        $id = $_POST["id"];
        $stmt->bind_param("i", $id);
        
        if($stmt->execute())
        {
            echo "<script> alert('Comentário deletado!') </script>";
        }
            
require("musica.php");
?>