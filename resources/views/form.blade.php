<!DOCTYPE html>
<html>
<head>
    <title>Form Page</title>
</head>
<body>

    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="input1" placeholder="Input 1"><br><br>
        <input type="text" name="input2" placeholder="Input 2"><br><br>
        <input type="text" name="input3" placeholder="Input 3"><br><br>
        <input type="file" name="image" accept=".jpg, .jpeg, .png"><br><br>
        <input type="number" step="0.01" name="float_value" placeholder="Float Value (2.50 - 99.99)"><br>
        <button type="submit">Submit</button><br>
    </form>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    
</body>
</html>
