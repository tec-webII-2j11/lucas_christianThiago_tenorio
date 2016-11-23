<?php

$conn = mysqli_connect("127.0.0.1:3306","lucaschristian","","renasca");

$query = mysqli_query($conn, "select usuario.nome as u, usuario.nivel as n, usuario.tem_foto as f, comentario.comentario as c, comentario.comentario_id as i, comentario.page as p from comentario, usuario WHERE usuario.nome = comentario.usuario");

if(!($query === false))
{       
        if(isset($_SESSION["nivel"]) && ($_SESSION["nivel"] == "adm"))
        { 
            
            while($exibe = mysqli_fetch_assoc($query))
            {
                if($exibe["p"] == $page)
                {
                
                    echo "<div></div>";
                    if($exibe["f"] == 1)
                    {
                        echo "<img style='width:40px; hight: 40px; display: inline'  src='images/perfil/fotoPerfil_". $exibe["u"]. ".jpg'></img>";
                    }
                    else
                    {
                        echo "<img style='width:40px; hight: 40px; display: inline'  src='images/perfil/brown-man-icon.png'></img>";
                    }
                    echo "<span style='color: #FFFFFF; display: inline'>  &nbsp &nbsp ".$exibe["u"]."</span> &nbsp disse:";
                    echo "<div></div>";
                    echo "<p>".$exibe["c"]."</p>";
                    echo "<div></div>";
                    echo "<form action='deletaComentario.php' method='post'><input type='hidden' name='id' value='".$exibe["i"]."'><input type='submit' value='Deletar Comentário' text='Deletar Comentário'></form>";
                    echo "<p>---------------------------------------------------------------------------------------------</p>";
                    
                }
            
            }
        }
        else
        {
            while($exibe = mysqli_fetch_assoc($query))
            {
                if($exibe["p"] == $page)
                {
                    
                    echo "<div></div>";
                    if($exibe["f"] == 1)
                    {
                        echo "<img style='width:40px; hight: 40px; display: inline'  src='images/perfil/fotoPerfil_" . $exibe["u"] . ".jpg'></img>";
                    }
                    else
                    {
                        echo "<img style='width:40px; hight: 40px; display: inline'  src='images/perfil/brown-man-icon.png'></img>";
                    }
                    echo "<span style='color: #FFFFFF; display: inline'> &nbsp &nbsp" . $exibe["u"] . "</span> &nbsp disse:";
                    echo "<div></div>";
                    echo "<p>" . $exibe["c"] . "</p>";
                    echo "<p>---------------------------------------------------------------------------------------------</p>";
                }
           }
            
        }
}
?>