<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__."/Models/Vacancy.php";
if(!$_SESSION['isAdmin']){
    header('Location: index.php');
    die;
}

if(isset($_POST['newStatus'])){
    Vacancy::changeStatus($_POST['description'], $_POST['newStatus']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class='container'>
        <div class='navbar'>
            <a href='logout.php'>Sair</a>
            <a href='add_vacancy.php'>Cadastrar vaga</a>
        </div>
        <div class='vacancies_container'>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Enterprise</th>
                    <th>Status</th>
                </tr>
                <?php
                $vagas = Vacancy::listAll();
                foreach($vagas as $vaga){
                    echo "<tr>
                    <td>{$vaga->getDescription()}</td>
                    <td>{$vaga->getDateAdded()}</td>
                    <td>{$vaga->getEnterprise()}</td>
                    <td>{$vaga->getStatus()}</td>";
                    if ($vaga->getStatus() == 'aberta'){
                        echo "<td><form action='admin_homepage.php' method='POST'><button>Mudar Status</button>
                        <input hidden value='{$vaga->getDescription()}' name='description'>
                        <input hidden value='fechada' name='newStatus'>  
                        </form></td>";
                    } else if ($vaga->getStatus() == 'fechada'){
                        echo "<td><form action='admin_homepage.php' method='POST'><button>Mudar Status</button>
                        <input hidden value='{$vaga->getDescription()}' name='description'>
                        <input hidden value='aberta' name='newStatus'>  
                        </form></td>";
                    } else {
                        echo "<td>Não é possível mudar o status desta vaga</td>";
                    }
                }
                
                ?>
            </table>
        </div>
    </div>
</body>
</html>