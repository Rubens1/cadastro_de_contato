<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		
			include('classes/'.$class.'.php');
		};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/esferas_software/');

	//Conectar com banco de dados!
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','esferas_software');

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Esferas Software');

?>