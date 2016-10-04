<?php

$arquivo = $_POST["arquivo"];

$comentarios = fopen("comentarios/".$arquivo . ".txt", "a+");

$nome = $_POST["nome"];
$comentario = $_POST["comentario"];

$linha = $nome."#".$comentario;

fwrite($comentarios, "\n");
fwrite($comentarios, $linha);

require($arquivo . ".php");

?>