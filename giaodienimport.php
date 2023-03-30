<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin import file excel</h1>
    <table border="1">
        <tr>
            <td>File địa điểm nơi ở</td>
            <td>
                <form action="./phpexcel/importfile.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file1">
                <button type="submit" name="btnGui">Import</button>
                </form>
            </td>
        </tr>
        <tr>
        <td>File địa điểm phương tiện đi lại</td>
        <td>
            <form action="./phpexcel/importfile1.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file1">
            <button type="submit" name="btnGui1">Import</button>
            </form>
        </td>
        </tr>
    </table>
</body>
</html>