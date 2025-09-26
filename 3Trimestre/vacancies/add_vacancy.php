<?php
session_start();
require_once __DIR__."/Models/Vacancy.php";
if(!$_SESSION['isAdmin']){
    header('Location: index.php');
}

if(isset($_POST['submit'])){
    $vacancy = new Vacancy($_POST['description'], $_POST['enterprise'], $_POST['status']);
    $vacancy->save();
    header('Location: admin_homepage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caddastrar vaga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="navbar"><a href="admin_homepage.php">Voltar</a></div>
        <form action="add_vacancy.php" method="POST">
            <label for="description">Descrição</label><textarea name="description" id="description" required></textarea>
            <label for="enterprise">Empresa</label><input type="text" name="enterprise" id="enterprise" required>
            <select name="status" id="status" required>
                <option value="aberta" default>Aberta</option>
                <option value="fechada">Fechada</option>
            </select>
            <button name="submit" id="submit" value="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>