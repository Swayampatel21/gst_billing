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
            font-size: 1.2rem;
            color: #555;
            text-align: left;
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
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $getRecordRow->id }}</td>
                </tr>
                <tr>
                    <td>Party Type Name</td>
                    <td>{{ $getRecordRow->get_parties_type_name->parties_type_name }}</td>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td>{{ date('d-m-Y', strtotime($getRecordRow->invoice_date)) }}</td>
                </tr>
                <tr>
                    <td>Invoice No</td>
                    <td>{{ $getRecordRow->invoice_no }}</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{ $getRecordRow->total_amount }}</td>
                </tr>
                <tr>
                    <td>Tax Amount</td>
                    <td>{{ $getRecordRow->tax_amount }}</td>
                </tr>
                <tr>
                    <td>Net Amount</td>
                    <td>{{ $getRecordRow->net_amount }}</td>
                </tr>
                <tr>
                    <td>Item Description</td>
                    <td>{{ $getRecordRow->item_description }}</td>
                </tr>
                <tr>
                    <td>CGST Rate</td>
                    <td>{{ $getRecordRow->cgst_rate }}</td>
                </tr>
                <tr>
                    <td>SGST Rate</td>
                    <td>{{ $getRecordRow->sgst_rate }}</td>
                </tr>
                <tr>
                    <td>IGST Rate</td>
                    <td>{{ $getRecordRow->igst_rate }}</td>
                </tr>
                <tr>
                    <td>CGST Amount</td>
                    <td>{{ $getRecordRow->cgst_amount }}</td>
                </tr>
                <tr>
                    <td>SGST Amount</td>
                    <td>{{ $getRecordRow->sgst_amount }}</td>
                </tr>
                <tr>
                    <td>IGST Amount</td>
                    <td>{{ $getRecordRow->igst_amount }}</td>
                </tr>
                <tr>
                    <td>Declaration</td>
                    <td>{{ $getRecordRow->declaration }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ date('d-m-Y', strtotime($getRecordRow->created_at)) }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ date('d-m-Y', strtotime($getRecordRow->updated_at)) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
