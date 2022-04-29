<?php

require_once 'class_book.php';
require_once 'class_cart.php';

$booksAdd = (new Book())->allAdd();
//print_r($booksAdd);


if (isset($_GET['id'])) {

    (new Cart())->deleteArtical($_GET['id']);
}


if (isset($_POST['change_quantity'])) {

  for ($i = 0; $i < count($booksAdd); $i++) {

    (new Cart())->updateQuantity($_POST[$booksAdd[$i]->cart_id], $booksAdd[$i]->cart_id);

  }
  header("Location: cart.php");

}


?>

<!doctype html>
<html lang="en">
<?php require 'head.php'; ?>

<body>
<?php require 'header.php'; ?>


<div class="container">
  <div class="h_style clearfix">
    <h2>Korpa</h2>
  </div>

<!-- Div cart articals -->

<?php if (count($booksAdd) != 0) { ?>
  <div class="row mt-5">
    <div class="col-12">
      <form action="cart.php" method="post">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Slika</th>
                <th scope="col">Ime knjige</th>
                <th scope="col">Cena (RSD)</th>
                <th scope="col">Količina</th>
                <th scope="col">Ukupna cena po artiklu</th>
                <th scope="col">Izbaci iz korpe</th>
              </tr>
            </thead>

            <tbody>
              <?php for ($i = 0; $i < count($booksAdd); $i++) { ?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><img src="<?php echo htmlspecialchars($booksAdd[$i]->image) ?>" alt="book first page" class="img_cart"></td>
                    <td><?php echo htmlspecialchars($booksAdd[$i]->name) ?></td>
                    <td><?php echo htmlspecialchars($booksAdd[$i]->price) ?><span> RSD</span></td>
                    <td>
                      <span>Promena količine<br>izabrane stavke:  </span>
                      <input type="number" 
                            name="<?php echo htmlspecialchars($booksAdd[$i]->cart_id) ?>" 
                            value="<?php echo htmlspecialchars($booksAdd[$i]->quantity) ?>" 
                            min="1" max="99"
                            class="form-control input_width">
                    </td>
                    <td><?php echo htmlspecialchars($booksAdd[$i]->price*$booksAdd[$i]->quantity) ?><span> RSD</span></td>
                    <td><a href="cart.php?id=<?php echo htmlspecialchars($booksAdd[$i]->cart_id)?>"><i class="fa-solid fa-trash-can fa_stily"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <button name="change_quantity" class="btn btn-primary btn_change_quantity float-end">Potvrdite nove količine</button>

      </form>
    </div> <!-- END div col-12 -->
  </div> <!-- END div cart articals -->
  <?php } else { ?>

  <div class="row mt-5 justify-content-md-center">
    <div class="col col-lg-10 empty_cart">Korpa je prazna. Za izbor knjiga, vratite se na <a href="index.php">Početnu stranicu</a></div>
  </div> <!-- END div cart articals -->

  <?php } ?>

<!-- Div SUM -->
  <div class="row">
    <div class="col-11">
      <table class="table table-dark table-striped m-5">
        <thead>
          <tr>
            <th colspan="2" class="text-center">VREDNOST KORPE</td>
          </tr>
        </thead>
        <tbody>
          <tr  class="fs-3">
            <th>UKUPNO ZA PLAĆANJE:</th>
            <td>
              <?php
                $z = 0;
                foreach ($booksAdd as $bookAdd) {
                  $z = $bookAdd->quantity * $bookAdd->price + $z;
                }
                echo $z . " RSD";
              ?>
            </td>
          </tr>
          <tr>
            <td colspan="2"><button class="btn btn-primary btn_change_quantity btn_buy">Nastavi sa porudžbinom</button></td>
          </tr>
        </tbody>
      </table>
    </div> <!-- END col-12 -->
  </div> <!-- END row -->
</div> <!-- END container -->

</body>
</html>