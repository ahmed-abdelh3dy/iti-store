<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>image</title>
</head>
<body>
    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">اختر صورة:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">رفع الصورة</button>
    </form>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    <img src="{{ session('image') }}" alt="الصورة المرفوعة" width="200">
@endif

    
</body>
</html>