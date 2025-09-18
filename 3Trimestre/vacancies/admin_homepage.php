<?php
session_start();
require_once __DIR__."\Models\Vacancy.php";
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
</head>
<body>
    <div class='container'>
        <div class='navbar'>
            <a href="login.php">Sou administrador</a>
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
                    if ($vaga->getStatus() == 'aberto'){
                        echo "<td><form action='admin_homepage.php' method='POST'><button>Mudar Status</button>
                        <input hidden value='{$vaga->getDescription()}' name='description'>
                        <input hidden value='fechado' name='newStatus'>  
                        </form></td>";
                    } else {
                        echo "<td><form action='admin_homepage.php' method='POST'><button>Mudar Status</button>
                        <input hidden value='{$vaga->getDescription()}' name='description'>
                        <input hidden value='aberto' name='newStatus'>  
                        </form></td>";
                    }
                }
                
                ?>
            </table>
        </div>
    </div>
</body>
</html>