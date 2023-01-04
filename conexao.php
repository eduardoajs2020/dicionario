<?php
//Credenciais de acesso ao BD

$db_name = "dicionario_ti";
$db_host = "localhost";
$db_user = "root";
$db_pass = "10205618";


$conn = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '10205618');
define('DBNAME', 'dicionario_ti');

$conn = new PDO('mysql:host='.HOST .';dbname=' .DBNAME .';', USER, PASS);*/
/*if($conn->connect_errno){
  echo "Erro de conexão";
}
else{
  echo "Conexão com o Banco de dados feita com sucesso!";
}*/

?>
