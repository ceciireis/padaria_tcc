<?php

include 'config.php';

if(isset($_POST['submit'])){

   $nome = mysqli_real_escape_string($conn, $_POST['nome']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['senha']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['csenha']));
   $tipo_usuario = $_POST['tipo_usuario'];

   $select_usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_usuario) > 0){
      $message[] = ' Este usuário já existe!';
   }else{
      if($senha != $csenha){
         $message[] = 'Confirme sua senha!';
      }else{
         mysqli_query($conn, "INSERT INTO usuario (nome, email, senha, tipo_usuario) VALUES('$nome', '$email', '$cpass', '$tipo_usuario')") or die('query failed');
         $message[] = 'Registrado com sucesso!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!--css style-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <?php
    if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
    ?>
    

    <div class="form-container">

        <form action="" method="post">
            <h3>Cadastre-se aqui!</h3>
            <input type="text" name="nome" placeholder="Seu nome" required class="box">
            <input type="email" name="email" placeholder="Entre com seu email" required class="box">
            <input type="password" name="senha" placeholder="Insira sua senha" required class="box">
            <input type="password" name="csenha" placeholder="Confirme sua senha" required class="box">
            <select name="tipo_usuario" class="box">
               <option value="user">Usuário</option>
               <option value="admin">Administrador</option> 
            </select>
            <input type="submit" name="submit" value="Cadastre-se" class="btn">
            <p>Já possui uma conta? Entre <a href="login.php">Aqui</a></p>
        </form>

    </div>

</body>
</html>
