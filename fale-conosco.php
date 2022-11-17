
    <?php

include 'config.php';

session_start();

$usuario_id = $_SESSION['usuario_id'];

if(!isset($usuario_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $nome = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $numero = $_POST['number'];
   $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);

   $select_mensagem = mysqli_query($conn, "SELECT * FROM `mensagem` WHERE nome = '$nome' AND email = '$email' AND numero = '$numero' AND mensagem = '$mensagem'") or die('Falha na consulta');

   if(mysqli_num_rows($select_mensagem) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO  mensagem (usuario_id, nome, email, numero, mensagem) VALUES('$usuario_id', '$nome', '$email', '$numero', '$mensagem')") or die('Falha na consulta');
      $mensagem[] = 'Mensagem enviada com sucesso!';
   }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link rel="stylesheet" href="css/style.css">
    <title>Fale conosco</title>
</head>

<body>
   <?php include 'header.php'; ?>

    <div class="heading">
        <h3> Fale conosco</h3>
        <p> <a href="home.php">Home</a> | Contato</p>
    </div>

<section class="contact">

    <form action="" method="post">
        <h3>Diga algo!</h3>
        <input type="text" name="nome" required placeholder="Seu nome" class="box">
        <input type="email" name="email" required placeholder="Seu email" class="box">
        <input type="phone" name="número" required placeholder="Telefone celular" class="box">
        <textarea name="mensagem" class="box" placeholder="Sua mensagem" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="enviar" name="send" class="btn">
    </form>

</section>

<?php include 'footer.php'; ?>

<!--javascript-->
<script src="js/script.js"></script>

</body>

</html>