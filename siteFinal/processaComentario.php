<?php

session_start();

if(isset($_SESSION["nickname"])){
$mysqli = new mysqli("127.0.0.1:3306","lucaschristian","","renasca");
$sql = 'INSERT INTO comentario (comentario, page, usuario) values(?,?,?)';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $_POST["comentario"], $_POST["page"], $_SESSION["nickname"]);
$stmt->execute();
}
else
{
    echo "<script> alert('Você precisa estar cadastrado e logado para postar comentários!'); </script>";
}

require($_POST["page"] . ".php");

?>