<!DOCTYPE html>
<?php

    include "admin\database\consulta.php";

    $title = $regtitle['title'];
	
	
	//Inicialização de sessão
	if(!isset($_SESSION)) {
    	session_start();
	}

	$nome = $_SESSION['nome'];
	$classe = $_SESSION['classe'];

    if(!isset($_SESSION['id'])){
        //die("Você não pode acessar está pagina porque não está longado.");
        header("Location: index.php");
    };
	
	//Ativação da area administrativa no menu principal
    $userlog = "não";

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin\css\style-padrao.css">
        <title></title>
    </head>
    <body>
        <div class="princ">teste</div>
        <img class="pc" src="admin/imgs/pc01.png"</td>
    </body>
</html>