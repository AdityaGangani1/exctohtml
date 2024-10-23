<!DOCTYPE html>
<html>
  <head>
    <title>Excel To HTML Using PHPSpreadSheet</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="3-excel-html.css">
  </head>
  <body>
    <table><?php
    // (A) PHPSPREADSHEET TO LOAD EXCEL FILE
    require "vendor/autoload.php";
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    // $spreadsheet = $reader->load("DummyData.xslx");
    $spreadsheet = $reader->load("pms.xlsx");

    $worksheet = $spreadsheet->getActiveSheet();

    // (B) LOOP THROUGH ROWS OF CURRENT WORKSHEET
    foreach ($worksheet->getRowIterator() as $row) {
      // (B1) READ CELLS
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(false);

      // (B2) OUTPUT HTML
      echo "<tr>";
      foreach ($cellIterator as $cell) { echo "<td>". $cell->getValue() ."</td>"; }
      echo "</tr>";
    }
    ?></table>
  </body>
</html>