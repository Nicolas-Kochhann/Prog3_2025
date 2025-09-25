<?php

if(isset($_POST['submit'])){
    require_once __DIR__."/classes/Usuario.php";
    $u = new Usuario($_POST['email'], $_POST['senha']);
    if($u->authenticate()){
        header('Location: restrita.php');
    } else {
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">E-mail</label><input type="email" name="email" id="email" required>
        <label for="senha">Senha</label><input type="password" name="senha" id="senha" required>
        <button name="submit" id="submit" value="submit">Logar</button>
    </form>
</body>
</html>