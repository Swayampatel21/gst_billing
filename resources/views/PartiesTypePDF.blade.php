<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        h1, p {
            text-align: center;
            color: #2c3e50;
            margin-top: 20px;
        }
        p {
            color: #555;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 30px;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Party Type Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parties as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->parties_type_name }}</td>    
                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
