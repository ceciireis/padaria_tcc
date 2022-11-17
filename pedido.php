<!--
    <?php 
     
    include 'config.php';

    session_start();

    $usuario_id = $_SESSION ['usuario_id'];

    if(!isset($usuario_id)){
        header ('location:login.php');
    }

    ?>
-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link css-->
    <link rel="stylesheet" href="css/style.css">

    <title>Pedidos | Finalização</title>
</head>

<body>

    <?php include 'header.php; ?>

    <div class="heading">
        <h3>Seu pedido</h3>
        <p> <a href="home(php).html">Home </a> / Sua encomenda </p>
    </div>

    <section class="placed-orders">

        <h1 class="title">Pedido </h1>

        <div class="box-container">

            <!--
                <?php
         $pedidos_query = mysqli_query($conn, "SELECT * FROM `pedidos` WHERE usuario_id = '$usuario_id'") or die('Falha na consulta');
         if(mysqli_num_rows($pedidos_query) > 0){
            while($fetch_pedidos = mysqli_fetch_assoc($pedidos_query)){
      ?>
            -->

            <div class="box">
                <p> Quantidade : <span><!--<?php echo $fetch_pedidos['quantidade']; ?>--></span> </p>
                <p> Nome : <span><!--<?php echo $fetch_pedidos['nome']; ?>--></span> </p>
                <p> Número: <span><!--<?php echo $fetch_pedidos['numero']; ?>--></span> </p>
                <p> E-mail : <span><!--<?php echo $fetch_pedidos['email']; ?>--></span> </p>
                <p> Endereço : <span><!--<?php echo $fetch_pedidos['endereco']; ?>--></span> </p>
                <p> Forma de pagamento : <span><!--<?php echo $fetch_pedidos['metodo']; ?>--></span> </p>
                <p> Suas enconmendas : <span><!--<?php echo $fetch_pedidos['total_produtos']; ?>--></span> </p>
                <p> Preço total : <span>$<!--<?php echo $fetch_pedidos['total_preco']; ?>-->/-</span> </p>
                <p> Status do pagamento : <!--span style="color: ;<?php if($fecth_pedidos['status_pagamento'] == 'pendente'){ echo 'red'; }else{ echo 'green';} ?>;"--><!--<?php echo $fetch_pedidos['status_pagamentos']; ?>--></span></p>
            </div>

            <!--
                <?php 
            } 
        } else {
            echo '<p class="empty">Nenhum pedido feito ainda!<p>';
        }
        ?>

            -->


        </div>

    </section>
    
    <!--<?php include 'footer.php'; ?>-->

    <!--javasricpt-->
    <script src="js/script.js"></script>

</body>
</html>