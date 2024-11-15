<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display CSV File</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Upload and Display CSV File</h2>
    <form action="display.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose a CSV file:</label>
        <input type="file" name="file" id="file" accept=".csv" required>
        <br><br>
        <button type="submit">Upload and Display</button>
    </form>
</body>
</html>
