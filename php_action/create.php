<?php
include_once 'db_connection.php';
session_start();


if(isset($_POST['cadastrar'])):

	$formatosPermitidos = array("jpg","jpeg","png","gif");
	$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
	if(empty($_POST['nome']) or empty($_POST['sobrenome']) or empty($_POST['idade']) or empty($_POST['email'])):
		header('Location: ../lista.php');
		$_SESSION['mensagem'] = "Preencha totos os campos!";


	else:
		in_array($extensao, $formatosPermitidos);
		$pasta = "../alunos/";
		$temporario = $_FILES['arquivo']['tmp_name'];
		$newname = uniqid().".$extensao";


	$nome = mysqli_escape_string($connection, $_POST['nome']);
	$sobrenome = mysqli_escape_string($connection, $_POST['sobrenome']);
	$idade = mysqli_escape_string($connection, $_POST['idade']);
	$email = mysqli_escape_string($connection, $_POST['email']);
	$curso = mysqli_escape_string($connection, $_POST['curso']);

	$sql = "INSERT INTO aluno(imagem, nome, sobrenome, idade, email, curso) VALUES('$newname','$nome', '$sobrenome', '$idade', '$email', '$curso')";

	if($result = mysqli_query($connection, $sql)):
		move_uploaded_file($temporario, $pasta.$newname);
		header('Location: ../lista.php');
	else:
		echo "não foi";

endif;
endif;
endif;

?>