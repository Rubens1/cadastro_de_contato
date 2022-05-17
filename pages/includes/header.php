<?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
  if($url != 'produto'){
    $urlPar = explode('/',$url)[0];
  }

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contato = MySql::conectar()->prepare("SELECT * FROM `tb_contato` WHERE id = ?");
    $contato->execute(array($id));
    $contato = $contato->fetch();
  }
 ?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content=" Esferas Software">
    <meta name="description" content="Projeto de GRUD simples">
    <meta name="author" content="Rubens Nogueira">
    <link rel="shortcut icon" href="<?php echo INCLUDE_PATH; ?>img/icon.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>font/css/all.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/global.css">
    
    <title>
      <?php
       if($url == 'home'){
          echo NOME_EMPRESA; 
        }else if($url == 'cadastro'){
          echo 'Cadastrar contato';
        }else if($url == 'editar'){
          echo 'Editar o contato do(a) '.$contato['nome'];
        } ?>
    </title>
    
  </head>
  <body>
   
