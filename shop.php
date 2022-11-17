<?php

include 'config.php';

session_start();

$usuario_id = $_SESSION ['user_id'];

if (!isset($usuario_id)){
    header ('location:login.php');
}

if (isset($_POST ['adicionar_carrinho'])){

    $produto_nome = $_POST['nome_produto'];
    $produto_preco = $_POST ['preco'];
    $produto_imagem = $_POST ['imagem'];
    $produto_quantidade = $_POST ['quantidade'];

    $check_cart_numbers = mysqli_query($coon, "SELECT * FROM carrinho WHERE name = $produto_nome AND user_id = 'user_id'") or die ('falha na consulta');

    if (mysqli_num_rows($check_cart_numbers) > 0 ){
        $menssage [] = 'já adicionado ao carrinho!';
    }else{
        mysqli_query($coon, "INSERT INTO carrinho (usuario_id,nome_produto,preco,quantidade,imagem) VALUES ('$usuario_id','$produto_nome','$produto_preco', '$produto_quantidade', $produto_imagem )") or die ('falha na consulta');
        $menssage = 'produto adiconado ao carrinho!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produtos</title>
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Nossos Produtos</h3>
   <p> <a href="home.php">home</a> / Produto </p>
</div>

<section class="products">

   <h1 class="title">Produtos</h1>

<div class="box-container">
    
   <?php

   $select_produto = mysqli_query ($conn,"SELECT * FROM produtos") or die ('falha na consulta');
   if (mysqli_num_rows($select_produto)> 0){
    while($fetch_produto = mysqli_fetch_assoc($select_produto)){
        ?>
         <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_produto['imagem']; ?>" alt="">
      <div class="name"><?php echo $fetch_produto['nome_produto']; ?></div>
      <div class="price">$<?php echo $fetch_produto['preco']; ?>/-</div>
      <input type="number" min="1" name="produto_quantidade" value="1" class="qty">
      <input type="hidden" name="produto_nome" value="<?php echo $fetch_produto['nome_produto']; ?>">
      <input type="hidden" name="produto_preco" value="<?php echo $fetch_produto['preco']; ?>">
      <input type="hidden" name="produto_imagem" value="<?php echo $fetch_produto['imagem']; ?>">
      <input type="submit" value="add to cart" name="adicionar_carrinho
      " class="btn">
     </form>

     <?php
    }
   }else{
    echo '<p class="empty">Nenhum produto adicionado ainda! </p>';
   }
   ?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!--javascript-->

<script src="js/script.js"> </script>

</body>
</html>