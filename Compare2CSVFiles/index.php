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

print_r($file1);

echo 'here - loaded 2 files with lines: ' . "{$count1} | {$count2}<br />";

// first we will look for headers - first row


?>