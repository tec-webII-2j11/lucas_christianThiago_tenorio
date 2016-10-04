<?php
$leituraComentarios = fopen("comentarios/".$arquivo . ".txt", "a+");

while(!feof($leituraComentarios))
{

    $linha = fgets($leituraComentarios);
    $linhaPartida = explode("#", $linha, 2);
    $nome = $linhaPartida[0];
    $comentario = $linhaPartida[1];
    
    echo "<div>".$nome.":</div>";
    echo "<div>".$comentario."</div>";
    echo "<div>--------------------------------------------------------------------------</div>";
}

fclose($leituraComentarios);
?>