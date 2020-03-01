<?php

/**
 * TO DO! Description and some info
 */

// define 2 CSV data files
$file1name = './data/file1.csv';
$file2name = './data/file2.csv';

// setup error message variable - array
$errorMsg = [];

// TO DO! Validate that both files exist

// read 2 files, load them into the memory or using stream?
// TO DO! Add a note about memory and file size possible issue?
// Multiple options to read file here - file(), file_get_contents(), fopen() and more
// let's try with file() which reads file into an array, each line is one item - load into memory
// if memory issues, then we will need to use fopen() and file stream
/*
if ($file1 = fopen($file1name, 'r')) {
    echo 'file 1 loaded ';
} else {
    echo 'NO LUCK! ';
}
if ($file2 = fopen($file2name, 'r')) {
    echo 'file 2 loaded ';
} else {
    echo 'NO LUCK! ';
}
*/
// after file loaded - lets get number of rows from each file for info (this might prevent data file encoding issues)
if ($file1 = file($file1name)) {
    $count1 = count($file1);
} else {
    $errorMsg[] = 'Unable to read First file: ' . $file1name . '!';
} // end if

if ($file2 = file($file2name)) {
    $count2 = count($file2);
} else {
    $errorMsg[] = 'Unable to read Second file: ' . $file2name . '!';
} // end if

// simple check for files
if (!$file1 || !$file2) {
    // TO DO! Better Error!
    print 'ERROR! Files not loaded! <br />';
    print_r($errorMsg);
    die();
} // end if

if ( ($count1 < 2) || ($count2 < 2)) {
    // TO DO! Better Error!
    print 'ERROR! Each CSV data file must have at least 2 lines, duh! <br />';
    die();
} // end if

echo 'HERE - loaded 2 files with lines: ' . "{$count1} | {$count2}. <br /><br />";

// first we will look for headers - first row
$headers1 = str_getcsv($file1[0]);
$headers2 = str_getcsv($file2[0]);

// compare column titles
// TO DO! This should be smarter and should ignore and warn about missing/additonal columns
if ($headers1 != $headers2) {
    print_r($headers2);
    print_r($headers1);
    // TO DO! Better Error!
    print 'ERROR! Column Titles values does not match! TO DO - make this smarter later! <br />';
    die();
} // end if

// TO DO! TO REMOVE!
// following is short test for first column = titles in our case
// this will need to be removed and rebuild later
$compareColumns = 'Title';
$compareColumnsIndex = 0;

// loop through CSV data file and load values for indexes???
$data1 = []; // this now holds only titles, needs to be multicolumn idea somehow
foreach ($file1 as $index => $row) {
    $rowData = str_getcsv($row);
    //print_r($rowData);
    $data1[] = $rowData[$compareColumnsIndex];
} // end foreach

print_r($data1);

$data2 = []; // this now holds only titles, needs to be multicolumn idea somehow
foreach ($file2 as $index => $row) {
    $rowData = str_getcsv($row);
    //print_r($rowData);
    $data2[] = $rowData[$compareColumnsIndex];
} // end foreach

print_r($data2);

// this is just hacking for now
// TO DO! To make this right!

$diff = array_diff($data1, $data2);
$intersect1 = array_intersect($data1, $data2);
$intersect2 = array_intersect($data2, $data1);
asort($intersect1);
asort($intersect2);

print_r($diff);
print_r($intersect1);
print_r($intersect2);

$duplicates = [];

foreach ($intersect1 as $rowIndex => $columnValue) {
    if (!isset($duplicates[$columnValue])) {
        $duplicates[$columnValue] = [];
    } // end if

    $duplicates[$columnValue][] = trim($file1[$rowIndex]) . ' | Line File 1: ' . $rowIndex;
}

foreach ($intersect2 as $rowIndex => $columnValue) {
    if (!isset($duplicates[$columnValue])) {
        $duplicates[$columnValue] = [];
    } // end if

    $duplicates[$columnValue][] = trim($file2[$rowIndex]) . ' | Line File 2: ' . $rowIndex;
}


print_r($duplicates);



echo '<br />End of script!!!<br />';


?>