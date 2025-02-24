<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل المنتج</title>
</head>
<body>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">اسم المنتج:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
    
        <div>
            <label for="price">السعر:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
        </div>
    
        <div>
            <label for="description">الوصف:</label>
            <input type="text" id="description" name="description" value="{{ $product->description }}">
        </div>

        <div>
            <label for="stock">المخزون:</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}">
        </div>

        <div>
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" value="{{ $product->slug }}">
        </div>
    
        <button type="submit">تحديث المنتج</button>
    </form>
</body>
</html>
