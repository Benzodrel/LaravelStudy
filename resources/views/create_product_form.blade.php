<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="/products" method="POST">
    @csrf
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
