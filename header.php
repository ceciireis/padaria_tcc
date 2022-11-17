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



<header class="header">

    <div class="header-1">
        <div class="flex">
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
            <p>Novo <a href="registro.php">Cadastro </a> | <a href="login.php">Login</a> </p>
        </div>
    </div>
    
    <div class="header-2">
        <div class="flex">
            <a href="home.php" class="logo"> </a>

            <nav class="navbar">
                <a href="home.php">Home</a>
                <a href="">Sobre nós</a>
                <a href="shop.php">Produtos</a>
                <a href=""></a>
                <a href="fale-conosco.php">Fale conosco</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-search"></div>
                <a href="search_page.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"> </div>
               
                <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM carrinho WHERE usuario_id = '$usuario_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
               

                 <a href="cart.php"> <i class=" fas fa-shopping-cart"></i> <span> (<?php echo $cart_rows_number; ?>)</span> </a>

            </div>

            <div class="user-box">
                <p>Usuário: <span> <?php echo $_SESSION['usuario_nome']; ?> </span></p>
                <p>Email: <span> <?php echo $_SESSION['usuario_email']; ?> </span></p>
                <a href="logout.php" class="delete-btn">Sair</a>
            </div>

        </div>
    </div>

</header>
</html>