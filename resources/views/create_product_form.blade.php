<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="/products" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price"><br><br>
    <input type="submit" value="Submit">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
