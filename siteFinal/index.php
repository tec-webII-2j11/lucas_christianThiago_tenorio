<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<script language="JavaScript1.3" type="text/javascript"
src="jse_form.js" charset="utf-8"></script>
<script>
function recarregar() {
    window.location.assign("index.php");
}
</script>
<title>
Renasça!
</title>
<style media="screen" type="text/css" >
    .inputfile + label { 
    margin-left: 21px;
    font-size: 16px;
    text-align: center;
    font-weight: 700;
    color: white;
    background-color: #734d26;
    display: inline-block;
    width: 136px;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: #392613;
}
#submit
{
    margin-left: 21px;
    width: 136px;
}
img{
    margin-left: 21px;
    filter: drop-shadow(8px 8px 12px rgba(0, 0, 0, .8));
}
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
</style>
<meta charset="utf-8">
</head>

<body>
<header>
<h1 id="titulo">Renasça!</h1>
 <h2 id="tudo">&nbsp;&nbsp;&nbsp; Tudo sobre o Renascimento Cultural.</h2>
 <div id="search">
<form name="jse_Form" action="javascript:search_form(jse_Form)">
<input type="text" name="d">
<input type="button" value="Buscar" onclick="search_form(jse_Form)">
</form>
</div>
</header>
<nav>
<ul>
<li><a href="oquefoi.php" target="iframe">O Que Foi</a></li>
<li><a href="musica.php" target="iframe">Música</a></li>
<li><a href="literatura.php" target="iframe">Literatura</a></li>
<li><a href="quadros.php" target="iframe">Plásticas</a></li>

</ul>

<form enctype="multipart/form-data" action="cadastrausuario.php" method="POST">
    <input type="text" pattern="[A-Za-z0-9]{3,10}" title="Seu Nickname deve ter entre 3 e 15 caracteres alphanuméricos." value="" required placeholder="Nick Name" name="nick" size="15" style="margin-left:20px">
    <div></div>
    <input type="password" pattern="[A-Za-z0-9]{5,16}" title="Seu Password deve ter entre 5 e 15 caracteres alphanuméricos." required placeholder="Password" name="pass" size="15" style="margin-left:20px">
    <div></div>
    <?php
        if(isset($_SESSION["foto_perfil"]))
        {
            echo "<img src='".$_SESSION["foto_perfil"]."' name='avatarFoto'></img>";
        }
        else
        {
            echo "<img src='images/perfil/brown-man-icon.png' name='avatarFoto'></img>";
        }
    ?>
    <?php
    
        if(isset($_SESSION["nickname"]))
        {
            echo "<div></div>";
            echo '<h3 style="';
            echo "font-family:'QaskinWhite_PersonalUse';"; 
            echo " font-size: 38px; margin-left: 21px;  margin-top: 0;  margin-bottom: 0; width:137px; text-align: center; background: rgba(255, 255, 255, .5)";
            echo '"';
            echo ">" . $_SESSION["nickname"] . "</h3";
        }

    ?>
    <div></div>
    <input type="file" name="avatar" id="avatar" size="15" class="inputfile">
    <label for="avatar">Foto Perfil</label>
    <div></div>
    <input type="submit" value="Sign In/Up" id="submit">
</form>
</nav>
<div id="container">
  <img id="cima-esquerda" src="images/cima-esquerda.png"/>
  <img id="cima-direita" src="images/cima-direita.png">
    <div id="centro">
       <div id="agrupador">
	   
	     <iframe id="iframe" name="iframe" src="oquefoi.php" charset="utf-8">
		 </iframe>
         <div id="content_top" src="images/content_top.png"></div>
         <div id="content" src="images/content_tile.png"></div>
         <div id="footer" src="images/footer.png"></div>
	   </div>
	   
    </div>
  <img id="baixo-esquerda" src="images/baixo-esquerda.png">
  <img id="baixo-direita" src="images/baixo-direita.png">
</div>
<script type="text/javascript" src="js.js"></script>
</body>

</html>