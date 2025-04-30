<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Download</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-top: 20px;
        }
        p {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
        }
        table {
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
                    <th>Invoice Date</th>
                    <th>Invoice No</th>
                    <th>Item Description</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getRecord as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->parties_type_name }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->invoice_date)) }}</td>
                    <td>{{ $value->invoice_no }}</td>
                    <td>{{ $value->item_description }}</td>
                    <td>{{ $value->total_amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CGST Rate</th>
                    <th>SGST Rate</th>
                    <th>IGST Rate</th>
                    <th>CGST Amount</th>
                    <th>SGST Amount</th>
                    <th>IGST Amount</th>
                    <th>Tax Amount</th>
                    <th>Net Amount</th>
                    <th>Declaration</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getRecord as $value)
                <tr>
                    <td>{{ $value->cgst_rate }}</td>
                    <td>{{ $value->sgst_rate }}</td>
                    <td>{{ $value->igst_rate }}</td>
                    <td>{{ $value->cgst_amount }}</td>
                    <td>{{ $value->sgst_amount }}</td>
                    <td>{{ $value->igst_amount }}</td>
                    <td>{{ $value->tax_amount }}</td>
                    <td>{{ $value->net_amount }}</td>
                    <td>{{ $value->declaration }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
