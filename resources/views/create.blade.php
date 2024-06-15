<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
<h1>Create Product</h1>
<form action="/products" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <label>Detail:</label>
        <textarea name="detail">{{ old('detail') }}</textarea>
    </div>
    <div>
        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price') }}">
        @error('price')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Image:</label>
        <input type="file" name="image">
        @error('image')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label>Category:</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Add Product</button>
    </div>
</form>
</body>
</html>
