<?php
//inicia a sessão

//inclui o banco de dados
include "../conexao.php";

//select para foto de perfil do usuário
$usuario = $_SESSION['usuario'];
$sql = "SELECT foto FROM usuario WHERE usuario = '$usuario'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
  }
$foto = $row['foto'];

?>