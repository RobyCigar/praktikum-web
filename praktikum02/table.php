<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
        <tr>
            <th><?= $_GET["nama"] ?></th>
            <th><?= $_GET["alamat"] ?></th>
        </tr>
    </table>
</body>
</html>