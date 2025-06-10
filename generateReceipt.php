<?php
session_start();
if (!isset($_SESSION['stuLogEmail'])) {
    echo "<script> location.href='loginorsignup.php'; </script>";
    exit;
}

$orderId = $_POST['ORDER_ID'] ?? 'ORD' . rand(100000, 999999);
$custId = $_POST['CUST_ID'] ?? $_SESSION['stuLogEmail'];
$amount = $_POST['TXN_AMOUNT'] ?? '0.00';
$date = date("d M, Y h:i A");
$receiptNo = 'REC' . rand(1000000, 9999999);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment Receipt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
        background: #f5f5f5;
        font-family: 'Segoe UI', sans-serif;
    }

    .receipt-box {
        max-width: 800px;
        margin: 40px auto;
        padding: 40px;
        background: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, .2);
        border-radius: 8px;
    }

    .receipt-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #eee;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .company-details {
        text-align: right;
    }

    .company-name {
        font-size: 28px;
        font-weight: bold;
    }

    .receipt-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin: 20px 0;
        color: #333;
    }

    .info-table th {
        width: 30%;
        text-align: left;
    }

    .info-table td {
        font-weight: 500;
    }

    .stamp {
        position: absolute;
        top: 40px;
        right: 60px;
        font-size: 36px;
        color: green;
        border: 2px solid green;
        padding: 10px 20px;
        transform: rotate(-15deg);
        font-weight: bold;
        opacity: 0.8;
    }

    .footer-note {
        margin-top: 30px;
        font-size: 13px;
        color: #777;
        text-align: center;
        border-top: 1px dashed #ccc;
        padding-top: 10px;
    }

    @media print {

        .btn-print,
        .btn-back {
            display: none;
        }
    }
    </style>
</head>

<body onload="window.print();">

    <div class="receipt-box position-relative">
        <div class="receipt-header">
            <div>
                <img src="https://via.placeholder.com/150x60?text=E-Learning+Logo" alt="Logo">
            </div>
            <div class="company-details">
                <div class="company-name">E-Learning Portal</div>
                <div>www.elearning.com</div>
                <div>support@elearning.com</div>
            </div>
        </div>

        <div class="receipt-title">Payment Receipt</div>

        <table class="table table-borderless info-table">
            <tr>
                <th>Receipt No:</th>
                <td><?php echo $receiptNo; ?></td>
            </tr>
            <tr>
                <th>Order ID:</th>
                <td><?php echo $orderId; ?></td>
            </tr>
            <tr>
                <th>Student Email:</th>
                <td><?php echo $custId; ?></td>
            </tr>
            <tr>
                <th>Transaction Amount:</th>
                <td>₹<?php echo number_format($amount, 2); ?></td>
            </tr>
            <tr>
                <th>Transaction Date:</th>
                <td><?php echo $date; ?></td>
            </tr>
            <tr>
                <th>Payment Status:</th>
                <td class="text-success font-weight-bold">Paid</td>
            </tr>
        </table>

        <div class="stamp">PAID</div>

        <div class="footer-note">
            This is a computer-generated receipt and does not require a physical signature.<br>
            For help, contact: <a href="mailto:support@elearning.com">support@elearning.com</a>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="courses.php" class="btn btn-secondary btn-back">Back to Courses</a>
        <button onclick="window.print()" class="btn btn-primary btn-print">Print Again</button>
    </div>

</body>

</html>