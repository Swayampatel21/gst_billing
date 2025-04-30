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
        h1, h2 {
            text-align: center;
            color: #2c3e50;
            margin-top: 20px;
        }
        h2 {
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
        img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ $title }}</h1>
        <h2>{{ $date }}</h2>

        <div>
            <img src="c:\Users\JEEL\OneDrive\Pictures\gst-letter-logo-design-in-illustration-logo-calligraphy-designs-for-logo-poster-invitation-etc-free-vector.jpg" alt="GST Logo">
        </div>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $getSingleRecord->id }}</td>
                </tr>
                <tr>
                    <td>Party Type Name</td>
                    <td>{{ !empty($getSingleRecord->get_parties_type_sigle->parties_type_name) ? $getSingleRecord->get_parties_type_sigle->parties_type_name : '' }}</td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td>{{ $getSingleRecord->full_name }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $getSingleRecord->phone_no }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $getSingleRecord->address }}</td>
                </tr>
                <tr>
                    <td>Account Holder Name</td>
                    <td>{{ $getSingleRecord->account_holder_name }}</td>
                </tr>
                <tr>
                    <td>Account No</td>
                    <td>{{ $getSingleRecord->account_no }}</td>
                </tr>
                <tr>
                    <td>Bank Name</td>
                    <td>{{ $getSingleRecord->bank_name }}</td>
                </tr>
                <tr>
                    <td>IFSC Code</td>
                    <td>{{ $getSingleRecord->ifsc_code }}</td>
                </tr>
                <tr>
                    <td>Bank Address</td>
                    <td>{{ $getSingleRecord->branch_address }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ date('d-m-Y', strtotime($getSingleRecord->created_at)) }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ date('d-m-Y', strtotime($getSingleRecord->updated_at)) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        </div>
    </div>

</body>
</html>
