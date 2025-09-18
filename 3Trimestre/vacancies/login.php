<?php
if(isset($_POST['botao'])){
    require_once __DIR__."\Models\User.php";
    $u = new User($_POST['email'], $_POST['senha']);
    if($u->authenticateAdmin()){
        header("location: admin_homepage.php");
    } else {
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
</head>
<body>
    <form action='login.php' method='post'>
        <label for='email'>E-mail:</label>
        <input type='email' name='email' id='email' required>
        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id=senha' required>
        <input type='submit' name='botao' value='Acessar'>
    </form>
</body>
</html>