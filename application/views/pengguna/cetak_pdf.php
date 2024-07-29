<!DOCTYPE html>
<html>
<head>
    <title>Cetak Tiket</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .ticket-container {
            width: 600px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            padding: 20px;
            position: relative;
            overflow: hidden;

        }
        .ticket-container::before, .ticket-container::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            transform: rotate(30deg);
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            padding: 10px;
            border-radius: 10px 10px 0 0;
            color: #0099ff;
        }
        .ticket-details {
            margin-top: 20px;
        }
        .ticket-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .ticket-details table, .ticket-details th, .ticket-details td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .ticket-details th {
            background-color: #4facfe;
            color: #fff;
        }
        .ticket-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            background-color: #4facfe;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            color: #fff;
        }
    </style>
</head>
</html>
