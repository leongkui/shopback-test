<?php

function arrangeArray( $thisArray )
{
    $thisArray = array_reverse($thisArray);
    if ( count($thisArray) == 1 ) {
        return $thisArray;
    } else {
        return array_merge(array_slice($thisArray, 0, 1), arrangeArray(array_slice($thisArray, 1)));
    }
}

function generateArray( $N )
{
    $thisTestArray = [];
    for($i=0;$i<$N;$i++)
    {
        $thisTestArray[$i] = $i;
    }

    return arrangeArray($thisTestArray);
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
    $thisTestArray = generateArray($tc[0]);
    echo "Test array = \n".implode(" ", $thisTestArray)."\n";
    echo "Index of " . (int)$tc[1] . " is " . array_search($tc[1], $thisTestArray). "\n";
}
