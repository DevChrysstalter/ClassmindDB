
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "<h1>PHP está funcionando!</h1>";

require_once __DIR__ . '/conecta.php';

echo "<p>Conexão com o MySQL realizada com sucesso!</p>";
?>
