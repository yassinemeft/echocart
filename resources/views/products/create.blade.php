<!-- resources/views/products/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="number" step="0.01" name="price" placeholder="Product Price" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="url" name="image_url" placeholder="Product Image URL">
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
