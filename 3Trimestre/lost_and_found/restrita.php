<?php
session_start();
require_once __DIR__."/classes/Item.php";
$itens = Item::findAll();
if (!isset($_SESSION['idUsuario'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achados e Perdidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.purple.min.css">
</head>
<body>
    <h1>Itens Perdidos</h1>
    <?php
    foreach($itens as $item){
        if($item->status == 1){
            echo "{$item->descricao} - {$item->local} - {$item->data}";
            echo "<br>";
        }
    }
    ?>
</body>
</html>