<!-- resources/views/PartiesTypePDF.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>GST Bill</h1>
    <p>Date: {{ $date }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>Party Name</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parties as $party)
                <tr>
                    <td>{{ $party->name }}</td>
                    <td>{{ $party->details }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
