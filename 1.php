<?php

$input = stream_get_contents(STDIN);

// First part
$up    = substr_count($input, '(');
$down  = substr_count($input, ')');
$floor = $up - $down;

echo "First part answer: $floor\n\n";

// Second part
$floor = 0;
$pos   = 0;

while($floor >= 0) {
    $char   = $input[$pos];
    $floor += $char === '(' ? +1 : ($char === ')' ? -1 : 0);

    $pos++;
}

echo "Second part answer: $pos\n";
