<?php

$input = stream_get_contents(STDIN);

// First part

$presents = strlen($input);
$houses   = [];
$pos      = [0,0];

for ($i = 0; $i < $presents; $i++) {
    $house = $pos[0] . 'x' . $pos[1];
    
    if (!in_array($house, $houses)) {
        $houses[] = $house;
    }

    $dir = $input[$i];
    $pos = [
            $pos[0] + ($dir === '>' ? 1 : ($dir === '<' ? -1 : 0)),
            $pos[1] + ($dir === '^' ? 1 : ($dir === 'v' ? -1 : 0))
           ];
}

$number = count($houses);
echo "First part answer: $number\n\n";

// Second part
$houses = [];
$pos    = ['s' => [0,0], 'r' => [0,0]];

for ($i = 0; $i < $presents + 1; $i++) {
    $person = $i % 2 === 0 ? 's' : 'r';
    $posP   = $pos[$person];
    $house  = $posP[0] . 'x' . $posP[1];


    if (!in_array($house, $houses)) {
        $houses[] = $house;
    }

    if ($i === $presents) continue;
    $dir = $input[$i];
    $pos[$person] = [
        $posP[0] + ($dir === '>' ? 1 : ($dir === '<' ? -1 : 0)),
        $posP[1] + ($dir === '^' ? 1 : ($dir === 'v' ? -1 : 0))
    ];
}

$number = count($houses);
echo "Second part answer: $number\n";
