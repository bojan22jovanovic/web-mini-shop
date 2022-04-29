<?php

require_once 'class_book.php';
require_once 'class_cart.php';

$books = (new Book())->all();
$cart = new Cart();
$msg1 = NULL;
$msg2 = NULL;

if (isset($_POST['addToCart'])) {

    $cart_number = $cart->selectedBook($_POST['bookId']);

    if (!$cart_number) {
        $cart->insertToCart($_POST['bookId']);
        $msg1 = "Artikal je dodat u korpu. Pogledajte ostatak ponude!";
    } else {
        $msg2 = "Artikal se već nalazi u korpi. Pogledajte vašu listu ulaskom u korpu!";
    }
}


?>

<!doctype html>
<html lang="en">
<?php require 'head.php'; ?>

<body>
<?php 
require 'header.php';
?>

<div class="container">

    <!-- Search input -->
    <div class="row text-center">
        <div class="col-lg-4 offset-lg-4">
            <input type="text" placeholder="Filtriranje knjiga po imenu" id="filterBooks" class="form-control">
        </div>
    </div>

    <!-- Info messages -->
    <p class="msg"><span class="green"><?php echo $msg1?? ''; ?></span><span class="red"><?php echo $msg2?? ''; ?></span></p>

    <!-- Books list -->
    <div class="row mt-5" id="booksWrap">

        <?php for ($i=0; $i < count($books); $i++) { ?>
        <div class="col-lg-2">
            <div class="card m-2">

                <img src="<?php echo htmlspecialchars($books[$i]->image); ?>" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($books[$i]->name) ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($books[$i]->price) ?> <span>RSD</span></p>

                    <form action="index.php" method="post">
                        <input type="hidden" name="bookId" value="<?php echo htmlspecialchars($books[$i]->id) ?>">
                        <button type="submit" name="addToCart" class="btn btn-success">Ubaci u korpu</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    let inputBtn = document.getElementById('filterBooks')
    let booksWrap = document.getElementById('booksWrap')

    inputBtn.addEventListener('input', function(){

        let valueBtn = inputBtn.value
        
        axios.post('filterBooks.php', JSON.stringify({
            search : valueBtn
        }))
        
        .then(function (data) {

            /* console.log(data) */

            let temp = ``

                data.data.books.forEach(function(book) {
                temp += `
                        <div class="col-lg-2">
                            <div class="card m-2">

                                <img src="${book.image}" class="card-img-top">

                                <div class="card-body">
                                    <h5 class="card-title">${book.name}</h5>
                                    <p class="card-text">${book.price}<span>RSD</span></p>

                                    <form action="index.php" method="post">
                                        <input type="hidden" name="bookId" value="${book.id}">
                                        <button type="submit" name="addToCart" class="btn btn-success">Ubaci u korpu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        `
            })
            booksWrap.innerHTML = temp
        })

        .catch(function (error) {  
            console.log("Error");
        })
    });

</script>

</body>
</html>