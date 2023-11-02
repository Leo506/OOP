<?php

require_once('Models.php');
require_once('Repositories.php');


//$dsn = "mysql:host=localhost;dbname=zinevftp_m4;charset=UTF8";
$dsn = "mysql:host=localhost;dbname=oop;charset=UTF8";

try {
    //$pdo = new PDO($dsn, 'zinevftp', 'm1G7Hk');
    $pdo = new PDO($dsn, 'root', 'password');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $cdRepository = new CdProductRepository($pdo);
    $bookRepository = new BookRepository($pdo);
    $products = array_merge($cdRepository->getAll(), $bookRepository->getAll());
} catch (PDOException $e) {
    echo 'Невозможно подключиться к серверу баз данных: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 2px solid black;
            padding: 10px;
        }
        .btn {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <button class="btn" onclick="location.href='/new.php'">Создать</button>
    <table>
        <tr>
            <th>Тип</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Цена</th>
            <th>Количество страниц</th>
            <th>Количество треков</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= get_class($product) ?></td>
                <td><?= $product->{'title'} ?></td>
                <td><?= $product->{'producer'} ?></td>
                <td><?= $product->{'price'} ?></td>
                <td><?= $product->{'pagesCount'} ?? '' ?></td>
                <td><?= $product->{'tracksNumber'} ?? '' ?></td>
                <td>
                    <button onclick="location.href='/edit.php?id=<?=$product->{'id'}?>'">Изменить</button>
                    <button onclick="location.href='/delete.php?id=<?=$product->{'id'}?>'">Удалить</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>