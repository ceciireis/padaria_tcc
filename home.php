

    <?php

include 'config.php';

session_start();

$usuario_id = $_SESSION['usuario_id'];

if(!isset($usuario_id)){
   header('location:login.php');
}

if(isset($_POST['adiconar_carrinho'])){

   $produto_nome = $_POST['produto_nome'];
   $produto_preco = $_POST['produto_preco'];
   $produto_imagem = $_POST['produto_imagem'];
   $produto_quantidade = $_POST['produto_quantidade'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM carrrinho WHERE name = '$produto_nome' AND usuario_id = '$usuario_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Já adicionado ao carrinho !';
   }else{
      mysqli_query($conn, "INSERT INTO carrinho (usuario_id, nome, preco, quantidade, imagem) VALUES('$user_id', '$produto_nome', '$produto_preco', '$produto_quantidade', '$produto_imagem')") or die('query failed');
      $message[] = 'Produto adicionado ao carrinho !';
   }

}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   
    <!--css link-->
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="home">
        <div class="content">
            <h3>Um novo jeito de se deliciar</h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
            <a href="about.php" class="white-btn">Descubra mais</a>
        </div>

    </section>

    <!--produtos-->

    <section class="products">

        <h1 class="title">Produtos mais recentes</h1>

        <div class="box-container">
           
            <?php  
         $select_produtos = mysqli_query($conn, "SELECT * FROM produtos LIMIT 10") or die('query failed');
         if(mysqli_num_rows($select_produtos) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_produtos)){
            ?>                
          
            <form action="" method="post" class="box">
                <img class="image" src="uploaded_img"> <?php echo $fetch_products['image']; ?>
                <div class="name"> <?php echo $fecth_produtos['nome']; ?> </div>
                <div class="preco"> $<?php echo $fecth_produtos['preco']; ?>/-</div>
                <input type="number" min="1" name="quantidade_produto" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fecth_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fecth_product['image']; ?>">
                <input type="submit" value="Adicionar no carrinho" name="add_to_cart" class="btn">

            </form>

            
                 <?php
                  }
      }else{
         echo '<p class="empty">Nenhum produto adicionado ainda!</p>';
      }
      ?>
            
        </div>

        <div class="load-more" style="margin-top: 2 rem; text-align:center">
            <a href="shop.php" class="option-btn">Carregar</a>
        </div>

        </section>

        <section class="about">

        <div class="flex">

            <div class="image">
                <img src="">
            </div>

        </div>

           </section>

           <section class="home-contact">

            <div class="content">
               <h3>Tem alguma pergunta?</h3>
               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
               <a href="fale-conosco.php" class="white-btn">Fale conosco</a>
            </div>


    </section>

<?php include 'footer.php'; ?>

<!--javasrcipt-->

<script src="js/script.js"></script>

</body>
</html>