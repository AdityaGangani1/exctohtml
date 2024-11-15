<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];

        // Validate if it's a CSV file
        $allowedExtensions = ['csv'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!in_array($fileExtension, $allowedExtensions)) {
            die("Error: Please upload a valid CSV file.");
        }

        echo "<h2>Contents of the CSV File:</h2>";
        echo "<table>";

        // Open the CSV file and read its content
        if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
            $isHeader = true;

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo "<tr>";
                foreach ($row as $cell) {
                    if ($isHeader) {
                        echo "<th>" . htmlspecialchars($cell) . "</th>";
                    } else {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                }
                echo "</tr>";
                $isHeader = false;
            }

            fclose($handle);
        } else {
            echo "Error: Unable to open the file.";
        }

        echo "</table>";
    } else {
        echo "Error: Please upload a file.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
