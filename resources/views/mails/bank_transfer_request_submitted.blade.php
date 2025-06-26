<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bank Transfer Request Submitted</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; color: #333; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);}
        h2 { color: #007bff; }
        .details { margin: 20px 0; }
        .details th, .details td { padding: 8px 12px; text-align: left; }
        .footer { margin-top: 30px; font-size: 0.95em; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bank Transfer Request Submitted</h2>
        <p>Dear {{ $user->name ?? 'User' }},</p>
        <p>
            We have received your bank transfer request. Our team will review your submission and notify you once it has been processed.
        </p>
        <table class="details">
            <tr>
                <th>Amount:</th>
                <td>{{ $amount ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Bank Name:</th>
                <td>{{ $bank_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Account Number:</th>
                <td>{{ $account_number ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Reference:</th>
                <td>{{ $reference ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Date Submitted:</th>
                <td>{{ $date_submitted ?? \Carbon\Carbon::now()->toDateString() }}</td>
            </tr>
        </table>
        <p>
            If you have any questions, please contact our support team.
        </p>
        <div class="footer">
            &copy; {{ date('Y') }} Your Company Name. All rights reserved.
        </div>
    </div>
</body>
</html>