<?php 

$cart = new Cart();
$articals_number = $cart->totalArticals();

$booksAdd = (new Book())->allAdd();
//print_r($articals_number);

?>

<header class="bg-secondary bg-danger fixed-top">  <!-- fixed-top -->
  <div class="container">
    <div class="row">
      <div class="col-10">
        <nav class="navbar navbar-expand-lg bg-danger bg-secondary">
          <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><h1>Book Store</h1></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon btn btn-success"></span>
              </button>
          </div>
        </nav>
      </div>
      <div class="col-2 div_cart float-end" title="Pogledajte svoju korpu">
        <a href="cart.php"><img src="img/cart.png" alt="cart">
        <span><?php if (count($booksAdd) != 0) { echo $articals_number->sum_q; } else {echo 0;} ?></span>
        </a>
      </div>
    </div>
  </div>
</header>