<!DOCTYPE html>
<html>
<head>
    <title>Form Page</title>
</head>
<body>
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="input1" placeholder="Input 1">
        <input type="text" name="input2" placeholder="Input 2">
        <input type="text" name="input3" placeholder="Input 3">
        <input type="file" name="image" accept=".jpg, .jpeg, .png">
        <input type="number" step="0.01" name="float_value" placeholder="Float Value (2.50 - 99.99)">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
