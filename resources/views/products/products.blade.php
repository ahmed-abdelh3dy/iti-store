<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>products</title>
</head>
<body>
<h1>products</h1>
<a href="{{route('products.create')}}">create products</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>desc</th>
            <th>price</th>
            <th>stock</th>
            <th>slug</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{$product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} جنيه</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->slug }} جنيه</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">تعديل</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    
</body>
</html>