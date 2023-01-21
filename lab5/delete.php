<?php
$id = $_GET['id'];
$q = "DELETE FROM `products` WHERE id = $id";
$qq = mysqli_query($GLOBALS['cnnct'], $q);
header('location: index.php?page_layout=list');
?>
