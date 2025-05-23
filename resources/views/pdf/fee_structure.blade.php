<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fee Structure</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        .info { margin-bottom: 20px; }
        .info p { margin: 4px 0; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td { border: 1px solid #333; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
<img 
  src="/home/a/Documents/projects/vue_and_laravel/todo-api/public/assets/img/image1.jpg" 
  alt="" 
  style="display: block; margin: 0 auto; border: 2px solid #333; width: 150px; height: auto; border-radius: 8px;"
>


    <h1>Fee Structure</h1>

    <div class="info">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Program:</strong> {{ $program?->title ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Fees Paid:</strong> ${{ number_format($user->fees_paid, 2) }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Installment</th>
                <th>Amount</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            {{-- Example static structure; replace with dynamic data if available --}}
            <tr>
                <td>First Installment</td>
                <td>$1,000.00</td>
                <td>2025-09-01</td>
            </tr>
            <tr>
                <td>Second Installment</td>
                <td>$1,000.00</td>
                <td>2026-01-15</td>
            </tr>
            <tr>
                <td>Final Installment</td>
                <td>$1,000.00</td>
                <td>2026-05-01</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
