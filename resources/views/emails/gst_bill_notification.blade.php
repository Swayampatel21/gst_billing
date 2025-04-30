<!DOCTYPE html>
<html>
<head>
    <title>New GST Bill Notification</title>
</head>
<body>
    <h1>New GST Bill Added</h1>
    <p>Dear {{ $party->full_name }},</p>
    <p>A new GST bill has been generated for you. Please find the details below and the PDF attached.</p>

    <table border="1" cellpadding="5">
        <tr>
            <th>Invoice No</th>
            <td>{{ $gstBill->invoice_no }}</td>
        </tr>
        <tr>
            <th>Invoice Date</th>
            <td>{{ date('d-m-Y', strtotime($gstBill->invoice_date)) }}</td>
        </tr>
        <tr>
            <th>Item Description</th>
            <td>{{ $gstBill->item_description }}</td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>Rs. {{ number_format($gstBill->total_amount, 2) }}</td>
        </tr>
        <tr>
            <th>CGST Rate</th>
            <td>{{ $gstBill->cgst_rate }}%</td>
        </tr>
        <tr>
            <th>SGST Rate</th>
            <td>{{ $gstBill->sgst_rate }}%</td>
        </tr>
        <tr>
            <th>IGST Rate</th>
            <td>{{ $gstBill->igst_rate }}%</td>
        </tr>
        <tr>
            <th>Tax Amount</th>
            <td>Rs. {{ number_format($gstBill->tax_amount, 2) }}</td>
        </tr>
        <tr>
            <th>Net Amount</th>
            <td>Rs. {{ number_format($gstBill->net_amount, 2) }}</td>
        </tr>
        <tr>
            <th>Declaration</th>
            <td>{{ $gstBill->declaration }}</td>
        </tr>
    </table>

    <p>Please review the attached PDF for a detailed copy of the GST bill.</p>
    <p>Thank you for your business!</p>
    <p>Best regards,<br>{{ env('APP_NAME') }}</p>
</body>
</html>