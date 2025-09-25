<?php
require_once __DIR__ . '/Models/Vacancy.php';
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
            <a href='login.php'>Sou administrador</a>
        </div>
        <div class='vacancies_container'>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Enterprise</th>
                </tr>
                <?php
                $vagas = Vacancy::listAll();
                foreach($vagas as $vaga){
                    if($vaga->getStatus() == "fechada"){
                        continue;
                    }
                    echo "<tr>
                    <td>{$vaga->getDescription()}</td>
                    <td>{$vaga->getDateAdded()}</td>
                    <td>{$vaga->getEnterprise()}</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>