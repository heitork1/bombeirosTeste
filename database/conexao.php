<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
define('HOST', 'localhost:3307');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'bombeirosteste');
 
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

?>