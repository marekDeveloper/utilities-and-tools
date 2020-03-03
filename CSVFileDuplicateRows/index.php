<?php

/**
 * TO DO! Description and some info
 */

// define CSV data files
$fileName = './data/file.csv';

// setup error message variable - array
$errorMsg = [];

// TO DO! Validate that file exists

// read dat file, load it into the memory or using stream?
// TO DO! Add a note about memory and file size possible issue?
// Multiple options to read file here - file(), file_get_contents(), fopen() and more
// let's try with file() which reads file into an array, each line is one item - load into memory
// if memory issues, then we will need to use fopen() and file stream

// after file loaded - lets get number of rows for info (this might prevent data file encoding issues)
if ($file = file($fileName)) {
    $count = count($file);
} else {
    $errorMsg[] = 'Unable to read CSV file: ' . $fileName . '!';
} // end if

// simple check for file
if (!$file) {
    // TO DO! Better Error!
    print 'ERROR! File not loaded! <br />';
    print_r($errorMsg);
    die();
} // end if

if ( $count < 2 ) {
    // TO DO! Better Error!
    print 'ERROR! CSV data file must have at least 2 lines, duh! <br />';
    die();
} // end if

echo 'HERE - loaded CSV file with lines: ' . "{$count}. <br /><br />";

// first we will look for headers - first row
$headers = str_getcsv($file[0]);

// TO DO! TO REMOVE!
// following is short test for first column = titles in our case
// this will need to be removed and rebuild later
$compareColumns = 'Title';
$compareColumnsIndex = 0;

// loop through CSV data file and load values for indexes???
$data = []; // this now holds only titles, needs to be multi-column idea somehow
foreach ($file as $index => $row) {
    $rowData = str_getcsv($row);
    //print_r($rowData);
    $data[] = $rowData[$compareColumnsIndex];
} // end foreach

print_r($data);

// this is just hacking for now
// TO DO! To make this right!
// find duplicate rows
$duplicates_arr = array_diff_assoc($data, array_unique($data));

print_r($duplicates_arr);

$duplicates = [];

foreach ($duplicates_arr as $rowIndex => $columnValue) {
    if (!isset($duplicates[$columnValue])) {
        $duplicates[$columnValue] = [];
    } // end if

    $duplicates[$columnValue][] = trim($file[$rowIndex]) . ' | Line File: ' . $rowIndex;
}

print_r($duplicates);

echo '<br />End of script!!!<br />';

?>