<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
</head>
<body>
    <h1>Form Data</h1>
    <table>
        <thead>
            <tr>
                <th>Input 1</th>
                <th>Input 2</th>
                <th>Input 3</th>
                <th>Image</th>
                <th>Float Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formData as $data)
            <tr>
                <td>{{ $data->input1 }}</td>
                <td>{{ $data->input2 }}</td>
                <td>{{ $data->input3 }}</td>
                <td><p>Image Path: {{ asset($data->image_path) }}</p></td>
                <td><img src="{{ asset($data->image_path) }}" alt="Image"></td>
                <td>{{ $data->float_value }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
