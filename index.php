<!DOCTYPE html>
<?php

    include "admin\database\consulta.php";
	
    $title = $regtitle['title'];

	if(isset($_POST['email']) || isset($_POST['senha'])){
		if(strlen($_POST['email']) == 0){
			echo "Preencha o seu E-mail";
		}else if(strlen($_POST['senha']) == 0){
			echo "Preencha a sua Senha";
		}else{
			$email = $mysqli->real_escape_string($_POST['email']);
			$senha = $mysqli->real_escape_string($_POST['senha']);

            $senha = base64_encode($senha);
			
			$sql_code = ("SELECT * FROM tb_users WHERE email = '$email' AND senha = '$senha'");
			$resultuser = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
			
			$quantidade = $resultuser->num_rows;
			
			if($quantidade == 1){
				
				$usuario = $resultuser->fetch_assoc();
				
				if(!isset($_SESSION)) {
					session_start();
				}
				
				$_SESSION['id'] = $usuario['id'];
				$_SESSION['nome'] = $usuario['nome'];
				$_SESSION['classe'] = $usuario['classe'];
				$_SESSION['pts'] = $usuario['pts'];
				
				
				
				header("location: longado.php");
				
			}else{
				echo "Falha ao logar! E-mail ou senha incorreto!";
			}
		}
	}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin\css\style-padrao.css">
        <title></title>
    </head>
    <body>
        <div class="princ">
        <form action="" method="post">
            <table class="users" align="center">
                <tr>
                    <th class="acess" colspan="3">Acesse sua conta:</th>
                </tr>
                <tr>
                    <th class="espaco" colspan="3">&nbsp;</th>
                </tr>
                <tr>
                    <th>Úsuario:</th>
                    <th colspan="2"><input type="text" name="email" size="20"></th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Senha:</th>
                    <th colspan="2"><input type="password" name="senha" size="20"></th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <th><button type="reset">Limpar</button></th>
                    <th><button type="submit">Enviar</button></th>
                </tr>
            </form>
                <tr>
                    <th class="espaco" colspan="3">&nbsp;</th>
                </tr>
            </table>
        </div>
        <img class="pc" src="admin/imgs/pc01.png"</td>
    </body>
</html>