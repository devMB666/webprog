<?php
$id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('file.xml');


$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');

$i=0;
while (is_object($product->item($i++))){
    $prd=$product->item($i-1)->getElementsByTagName('id')->item(0);
    $prd_id= $prd->nodeValue;
    if( $prd_id== $id){
        $products->removeChild($product->item($i-1));
        break;
    }
}

$dom->formatOutput=true;
$dom->save('file.xml')or die('Error! Try again later');


header('location: index.php?page_layout=list');
?>