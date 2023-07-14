<?php 

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

use \App\Entity\Vaga;
$obVaga = Vaga::getVaga($_GET['id']);

if (!isset($_GET['id']) or !is_numeric($_GET['id']) or !$obVaga instanceof Vaga) {
    header('Location: index.php?status=error');
    exit;
}

if (isset(
            $_POST['titulo'],
            $_POST['descricao'],
            $_POST['ativo']
            )) {
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    $obVaga->editar();
    
    header('Location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';