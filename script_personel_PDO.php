<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP File</title>
</head>
<body>

<h2>Upload ZIP File</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Mettez ici une archive ZIP:</label>
    <input type="file" id="file" name="file" accept=".zip" required>
    <br><br>
    <input type="submit" value="Upload ZIP">
</form>

</body>
</html>

