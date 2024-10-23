<?php
// (A) PHPSPREADSHEET TO LOAD EXCEL FILE
require "vendor/autoload.php";
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("x.xlsx");

// (B) LOOP THROUGH ALL WORKSHEETS
for ($i=0; $i<$spreadsheet->getSheetCount(); $i++) {
  // (B1) GET WORKSHEET
  $worksheet = $spreadsheet->getSheet($i);

  // (B2) LOOP THROUGH ROWS & CELLS OF WORKSHEET
  foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    foreach ($cellIterator as $cell) { echo $cell->getValue() ."<br>"; }
  }
}