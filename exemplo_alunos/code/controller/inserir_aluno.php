<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: home.php');
}

require_once '../model/aluno.php';
require_once '../model/aluno_dao.php';

$nome = $_GET['nome'];
$endereco = $_GET['endereco'];
$telefone =  $_GET['telefone'];
$data_nascimento = $_GET['data_nascimento'];

// echo $nome;

$aluno = new Aluno(0, $nome, $endereco, $telefone, $data_nascimento);

$alunoDao = new AlunoDao();

$alunoDao->inserir($aluno);

// echo '<pre>';
// print_r($aluno);
// echo '</pre>';

header('Location: ../public/home.php');

