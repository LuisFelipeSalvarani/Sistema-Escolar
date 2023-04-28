<?php

// Inclui o arquivo que contém a definição da classe Diciplina
require_once 'classes/Diciplina.php';

// Cria um novo objeto Diciplina utilizando o id do objeto como referência
$id = $_POST['id'];
$diciplina = new Diciplina($id);
// Define as propriedades descDiciplina e ano do objeto Diciplina
$diciplina->descDici = $_POST['descDici'];
$diciplina->ano = $_POST['ano'];

// Chama o método atualizar() no objeto Diciplina
$diciplina->atualizar();
// Redireciona o usuário para a página "Diciplinas-listar.php"
header('Location: diciplinas-listar.php');

?>