<?php
$doc = new DOMDocument();
$doc->load('file.xml');
$products = $doc->getElementsByTagName('products')->item(0);
$product = $products->getElementsByTagName('product');
$ind = $product->length;
$id = $product[$ind - 1]->getElementsByTagName('id')->item(0)->nodeValue+1;
if(isset($_POST['submit'])){
    $the_name = $_POST['the_name'];
    $price = $_POST['price'];
    $descr = $_POST['descr'];

    $newprod = $doc->createElement('product');

    $new_id = $doc->createElement('id', $id);
    $newprod->appendChild($new_id);

    $new_name = $doc->createElement('name', $the_name);
    $newprod->appendChild($new_name);//(!(is_null($new_name) ? $new_name : $oldname));

    $new_price = $doc->createElement('price', $price);
    $newprod->appendChild($new_price);//(!(is_null($new_price)) ? $new_price : $oldprice);

    $new_descr = $doc->createElement('descr', $descr);
    $newprod->appendChild($new_descr);//(!(is_null($new_descr)) ? $new_descr : $olddescr);
    $products->appendChild($newprod);
    $doc->formatOutput = true;
    $doc->save('file.xml') or die ('Error! We are trying to solve this problem!');
    header('location: index.php?page_layout = list');
}
?>

<div class = "prod-content">
    <div class = "content-name">
        <h1>Добавить новую позицию</h1>
    </div>
    <div class = "prod-list" >
        <form method = "POST"  enctype="multipart/form-data">
            <div class = "items">
                <label class="namin" for = "cr">Название</label>
                <textarea id = "cr" rows="1" name = "the_name" class="form-control" required></textarea>
            </div>
            <div class = "items">
                <label class="namin" for = "cr">Цена</label>
                <input id = "cr" type = "number" name = "price" class="form-control" required>
            </div>
            <div class = "items">
                <label class="namin" for = "cr">Описание</label>
                <textarea id = "cr" rows="3" name = "descr" class="form-control" required></textarea>
            </div>
            <button name = "submit" type = "submit">Сохранить</button>
        </form>
    </div>
</div>
