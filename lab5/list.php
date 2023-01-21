<?php
$query = 'SELECT * FROM products';
$res = mysqli_query($GLOBALS['cnnct'], $query);
?>

    <div class = "prod-content">
        <div class = "content-name">
            <h1>Товары</h1>
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
                <?php
                $cnt = 1;
                foreach ($res as $one) { ?>
						<tr>
							<td><?php echo $cnt++?></td>
							<td><?php echo $one['name']?></a></td>
							<td><?php echo $one['price']?></td>
							<td><?php echo $one['descr'] ?></td>
							<td><a href="index.php?page_layout=update&id=<?php echo $one['id']; ?>">Редактировать</a></td>
							<td><a onclick="return confirmation('<?php echo $one['name'];?>')"  href= "index.php?page_layout=delete&id=<?php echo $one['id']; ?>">Удалить</a></td>
                            <?php ?>
                            <?php ?>
						</tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="index.php?page_layout=create" style="width:30%;font-size: 24px; border-radius: 10px; background: lightsteelblue; margin-left: 50%; margin-right: 50%; text-align: center;">
                Добавить позицию
            </a>

        </div>
    </div>

    <script>
        function confirmation(name){
            return confirm("Вы правда хотите удалить позицию: \""+name+"\"?");
        }
    </script>
