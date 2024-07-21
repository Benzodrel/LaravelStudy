<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@foreach ($products as $product)
    <div>
        <h3>{{$product->getName() }}</h3>
        <p> {{ $product->getPrice() }}</p>
    </div>>
@endforeach

<a href="/products/new">Add</a>
<a href="/products/update">Update or Delete</a>
</body>
</html>
