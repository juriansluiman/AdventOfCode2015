<?php

$input = stream_get_contents(STDIN);

// First part
$gifts = explode("\n", $input);
$paper = 0;

foreach ($gifts as $gift) {
    if ($gift === "") continue;

    $sizes  = explode('x', $gift);
    $wrap   = $sizes[0] * $sizes[1] + $sizes[1] * $sizes[2] + $sizes[2] * $sizes[0];

    // Small to large sorting
    sort($sizes);
    $extra  = $sizes[0] * $sizes[1];

    $paper += 2*$wrap + $extra;


}

echo "First part answer: $paper\n\n";

// Second part
$ribbon = 0;

foreach ($gifts as $gift) {
    if ($gift === "") continue;

    $sizes  = explode('x', $gift);
    sort($sizes);

    $ribbon += 2 * $sizes[0] + 2 * $sizes[1];
    $ribbon += $sizes[0] * $sizes[1] * $sizes[2];
}

echo "Second part answer: $ribbon\n";
