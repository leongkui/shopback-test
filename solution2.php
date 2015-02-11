<?php

//  N = number item in the array
//  V = value to be searched
function calculateIndex($N, $V)
{
    $max = $N - 1;
    if ( $V < (($N-1)/2) ) {
        return 2*$V + 1;
    } else {
        return 2*($max - $V);
    }
}

$filename = $argv[1];

if ( is_readable($filename) ) { 
    $fh = fopen($filename, 'r');
} else {
    die( "Unable to read $filename!\n" );
}

$numberOfTest = 0;
$testCases = [];
$lineCount = 0;

while( $thisLine = fgets($fh) )
{
    $lineCount++;
    if ( $lineCount == 1 ) {
        $numberOfTest = $thisLine;
    } else {
        $testCase = explode(' ', $thisLine);
        $testCases[] = $testCase;
    }
}

foreach ( $testCases as $tc )
{
    echo "test case of N = " . $tc[0] . ", finding index of " . $tc[1] ;
    echo "Index of " . (int)$tc[1] . " is " . calculateIndex((int)$tc[0],(int)$tc[1]) . "\n";
}
