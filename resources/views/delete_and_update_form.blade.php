<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
@foreach ($products as $product)

    <div>
        <h3>{{$product["name"]}}</h3>
        <form action="/products/update" method="post">
            <input type="hidden" name="_method" value="put" />
            @csrf
            <label for="id">Id:</label><br>
            <input type="text" id="id" name="id" value="{{$product["id"]}}" readonly><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{$product["name"]}}"><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="{{$product["price"]}}"><br><br>
            <input type="submit" value="Update">
        </form>

        <form method="post" action="/products/delete">
            <input type="hidden" name="_method" value="delete" />
            @csrf
            <button type="submit" name="id" value="{{$product["id"]}}">Delete</button>
        </form>

    </div>
@endforeach
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="/products">Index</a>
</body>
</html>
