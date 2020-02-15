<?php

/**
 * TO DO! Description and some info
 */

// define 2 CSV data files
$file1name = './data/file1.csv';
$file2name = './data/file2.csv';

// TO DO! Validate that both files exist

// read 2 files, load them into memory
// TO DO! Add a note about memory and file size possible issue?
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

// lets get number of rows from each file for info (this might prevent data file encoding issues)
$count1 = count($file1);
$count2 = count($file2);

echo 'here - loaded 2 files with lines: ' . "{$count1} | {$count2}<br />";

// first we will look for headers - first row


?>