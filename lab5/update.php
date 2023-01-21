<?php
$id = $_GET['id'];
$query = 'SELECT * FROM `products`';
$res = mysqli_query($GLOBALS['cnnct'], $query);

$qu_for_one = "SELECT * FROM products WHERE id = $id";
$to_upd = mysqli_query($GLOBALS['cnnct'], $qu_for_one);

$get_to_upd = mysqli_fetch_assoc($to_upd);
$oldname = $_GET['name'];
$oldprice = $_GET['price'];
$olddescr = $_GET['descr'];

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $descr = $_POST['descr'];

    $qu_upd = "UPDATE products SET name='$name', price='$price', descr = '$descr' WHERE id = $id";
    $smt = mysqli_query($GLOBALS['cnnct'], $qu_upd);

    header('location: index.php?page_layout=list');
}
?>

<div class = "prod-content">
    <div class = "content-name">
        <h1>Редактировать</h1>
    </div>
    <div class = "prod-list">
        <form method = "POST" enctype="multipart/form-data">
            <div class = "items">
                <label for = "upd">Название</label>
                <textarea id = "upd" rows="1" name = "name" class="form-control" required><?php echo $get_to_upd['name']?></textarea>
            </div>
            <div class = "items">
                <label for = "upd">Цена</label>
                <textarea id = "upd" rows="1" name = "price" class="form-control" required><?php echo $get_to_upd['price']?></textarea>
            </div>
            <div class = "items">
                <label for = "upd">Описание</label>
                <textarea id = "upd" rows="3" name = "descr" class="form-control" required><?php echo $get_to_upd['descr']?></textarea>
            </div>
            <button name = "submit" type = "submit">Сохранить</button>
        </form>
    </div>
</div>