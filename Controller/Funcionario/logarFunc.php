<?php

require_once("../../Banco/Conexao.php");

session_start();

if(isset($_POST['btnLogar'])){
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);
    $permissao = $_POST['permissao'];
    $login=mysqli_query($connection,"SELECT usuario , senha, tipo FROM usuario WHERE usuario='$usuario' AND senha='$senha' AND tipo='$permissao'");
    if(mysqli_num_rows($login) == 1){
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['permissao'] = $_POST['permissao'];
        switch($permissao){
            case 1: //gerente
                header("Location:  ../../Views/Funcionario/statusMesa.php");
                break;
            case 2: //garcom
                header("Location: ../../Views/Funcionario/statusMesa.php");
                break;
            case 3: //cozinha
                header("Location:../../Views/Funcionario/listarPedidos.php");
                break;
            default:
                header('Location:../../Views/Funcionario/statusMesa.php');
                break;
        }
    }elseif(mysqli_num_rows($login) == 0){
        echo "<script>window.alert('Dados invalidos, tente novamente!');window.location.href='../../views/login/index.php?=erro';</script>";
    
    }
    }




?>