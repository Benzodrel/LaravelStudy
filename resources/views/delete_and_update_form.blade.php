<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@foreach ($products as $product)

    <div>
        <h3>{{$product->getName()}}</h3>
        <form action="/products/update" method="post">
            @csrf
            <label for="id">Id:</label><br>
            <input type="text" id="id" name="id" value="{{$product->getId()}}" readonly><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{$product->getName()}}"><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="{{$product->getPrice()}}"><br><br>
            <input type="submit" value="Update">
        </form>

        <form method="post" action="/products/delete">
            @csrf
            <button type="submit" name="id" value="{{$product->getId()}}">Delete</button>
        </form>

    </div>
@endforeach

<a href="/products">Index</a>
</body>
</html>
