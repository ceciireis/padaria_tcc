
<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));

   $select_usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'") or die('Falha na consulta');

   if(mysqli_num_rows($select_usuario) > 0){

      $row = mysqli_fetch_assoc($select_usuario);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['tipo_usuario'] == 'user'){

         $_SESSION['usuario_nome'] = $row['nome'];
         $_SESSION['usuario_email'] = $row['email'];
         $_SESSION['usuario_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
      $message[] = 'Email ou senha incorreta!';
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
    <h3>Login</h3>
    <input type="email" name="email" placeholder="Entre com seu email" required class="box">
    <input type="password" name="senha" placeholder="Insira sua senha" required class="box">
    <input type="submit" name="submit" value="login" class="btn">
    <p>Não possui uma conta?<a href="registro.php">Cadastre aqui</a></p> 
</form>

</div>

</body>
</html>

