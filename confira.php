<!--
    <?php

include 'config.php';

session_start();

$user_id = $_SESSION['usuario_id'];

if(!isset($usuario_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $nome = mysqli_real_escape_string($conn, $_POST['nome']);
   $numero = $_POST['numero'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $metodo = mysqli_real_escape_string($conn, $_POST['metodo']);
   $endereco = mysqli_real_escape_string($conn,  $_POST['rua']. ', ' . $_POST['complemento'].  ', ' . $_POST['cidade']. ' - ' . $_POST['estado']);
   $quantidade = date('d-M-Y');

   $carrinho_total = 0;
   $carrinho_produtos[] = '';

   $carrinho_query = mysqli_query($conn, "SELECT * FROM `carrinho` WHERE usuario_id = '$usuario_id'") or die('Falha na consulta');
   if(mysqli_num_rows($carrinho_query) > 0){
      while($carrinho_item = mysqli_fetch_assoc($carrinho_query)){
         $carrinho_produtos[] = $carrinho_item['nome'].' ('.$carrinho_item['quantidade'].') ';
         $sub_total = ($carrinho_item['preco'] * $carrinho_item['quantidade']);
         $carrinho_total += $sub_total;
      }
   }

   $total_produtos = implode(', ',$carrinho_produtos);

   $pedidos_query = mysqli_query($conn, "SELECT * FROM `pedidos` WHERE nome = '$nome' AND numero = '$numero' AND email = '$email' AND metodo = '$metodo' AND endereco = '$endereco' AND total_produtos = '$total_produtos' AND total_preco = '$carrinho_total'") or die('Falha na consulta');

   if($carrinho_total == 0){
      $message[] = 'Seu carrinho está vazio';
   }else{
      if(mysqli_num_rows($pedidos_query) > 0){
         $message[] = 'pedido já feito!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `pedidos`(usuario_id, nome, numero, email, metodo, endereco, total_produtos, total_preco, quantidade) VALUES('$usuario_id', '$nome', '$numero', '$email', '$metodo', '$endereco', '$total_produtos', '$carrinho_total', '$quantidade')") or die('Falha na consulta');
         $message[] = 'Pedido feito com sucesso!';
         mysqli_query($conn, "DELETE FROM `carrinho` WHERE usuario_id = '$usuario_id'") or die('Falha na consulta');
      }
   }
   
}

?>
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link rel="stylesheet" href="css/style.css">

    <title>Finalização | Pedidos</title>
</head>

<body>
    
    <!--<?php include 'header.php'; ?>-->

    <div class="heading">
        <h3>Confirmação</h3>
         <p> <a href="home(php).html">Home</a> / Confirmação do pedido </p>

    </div>

    <section class="display-order">

        <!--
 ?>
   <p> <?php echo $fetch_carrinho['nome']; ?> <span>(<?php echo '$'.$fetch_carrinho['preco'].'/-'.' x '. $fetch_carrinho['quantidade']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Seu carrinho está vazio</p>';
   }
   ?>

   <div class="grand-total"> Total: <span>$ <?php echo $grand_total; ?>/-<span> </div>
        -->
    </section>

    <section class="checkout">

        <form action="" method="post">
            <h3>Coloque as informações abaixo para confirmar seu pedido</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Seu nome:</span>
                    <input type="text" name="nome" required placeholder="Coloque seu nome">
                </div>

                <div class="inputBox">
                <span>Seu número:</span>
                <input type="number" name="numero" required placeholder="Telefone para contato">
                </div>

                <div class="inputBox">
                <span>Seu e-mail:</span>
                <input type="email" name="email" required placeholder="Seu email">
             </div>

                <div class="inputBox">
                <span>Metódo de pagamento</span>
                <select name="method">
                    <option value="pagemento na entrega">Pagemento na entrega</option>
                    <option value="cartao de credito">Cartao de crédito</option>
                    <option value="cartao de débito">Cartao de débito</option>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Pix">Pix</option>
                </select>
                </div>

                <div class="inputBox">
                <span>Endereço:</span>
                <input type="text" name="rua" required placeholder="Bairro - nome rua">
                </div>

                <span>N°:</span>
                <input type="text" name="complemento" required placeholder="N°">
                </div>

             <div class="inputBox">
                <span>Cidade:</span>
                <input type="text" name="cidade" required placeholder="e.g. mumbai">
             </div>

             <div class="inputBox">
                <span>Estado:</span>
                <input type="text" name="estado" required placeholder="EE">
             </div>

            </div> 
            
            <input type="submit" value="Enviar" class="btn" name="order_btn">
        </form>

    </section>

    <!--php include 'footer.php'; ?>-->

    <!--javascript-->
    <script src="js/script.js"></script>

</body>
</html>