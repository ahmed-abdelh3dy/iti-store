<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>products</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">اسم المنتج:</label>
            <input type="text" id="name" name="name" required>
        </div>
    
        <div>
            <label for="price">السعر:</label>
            <input type="number" id="price" name="price" required>
        </div>
    
        <div>
            <label for="image">desc</label>
            <input type="text" id="image" name="description">
        </div>
        <div>
            <label for="image">stock</label>
            <input type="text" id="image" name="stock">
        </div>

        <div>
            <label for="image">slug</label>
            <input type="text" id="image" name="slug">
        </div>
    
        <button type="submit">إضافة المنتج</button>
    </form>
    
    
</body>
</html>