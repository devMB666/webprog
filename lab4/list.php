<?php
$doc = new DOMDocument();//
$doc -> load('file.xml');
$products = $doc -> getElementsByTagName('products') -> item(0);
?>

<div class = "prod-content">
    <div class = "content-name">
        <h1>Товары PRO</h1>
    </div>
    <div class = "prod-list" style="align-items: center">
        <table class = "table">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php $cnt = 0;
            $product = $products -> getElementsByTagName('product');
            while (is_object($product -> item($cnt ++))){
                ?>
                <tr>
                    <td><?php echo $cnt?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('name') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('price') -> item(0) -> nodeValue?></td>
                    <td><?php echo $product -> item($cnt - 1) -> getElementsByTagName('descr') -> item(0) -> nodeValue?></td>
                    <td><a href="index.php?page_layout=update&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>">Редактировать</a></td>
                    <td><a onclick="return confirmation('<?php echo $product->item($cnt-1)->getElementsByTagName('name')->item(0)->nodeValue;?>')" href= "index.php?page_layout=delete&id=<?php echo  $product->item($cnt-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Удалить</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        <a href="index.php?page_layout=create" style="width:30%;font: 20px 'Arial Black';color: whitesmoke;font-size: 24px; border-radius: 0px; background: #9CBCC3; margin-left: 50%; margin-right: 50%; text-align: center; margin-top: 5%;border: 1px solid whitesmoke";>
            Добавить позицию
        </a>

    </div>
</div>

<script>
    function confirmation(name){
        return confirm("Вы правда хотите удалить позицию: \""+name+"\"?");
    }
</script>