<?php
$_1to19 = [
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
    "ten",
    "eleven",
    "twelve",
    "thirteen",
    "fourteen",
    "fifteen",
    "sixteen",
    "seventeen",
    "eighteen",
    "nineteen",
];
$_teen = [
    "twenty",
    "thirty",
    "forty",
    "fifty",
    "sixty",
    "seventy",
    "eighty",
    "ninety",
];
$_mult = [
    2  => 'hundred',
    3  => 'thousand',
    6  => 'million',
    9  => 'billion',
    12 => 'trillion',
    15 => 'quadrillion',
    18 => 'quintillion',
    21 => 'sextillion',
    24 => 'septillion', // php can't count this high
    27 => 'octillion',
];
$fnBase = function ($n, $x) use (&$fn, $_mult) {
    return $fn($n / (10 ** $x)) . ' ' . $_mult[$x];
};
$fnOne = function ($n, $x) use (&$fn, &$fnBase) {
    $y = ($n % (10 ** $x)) % (10 ** $x);
    $s = $fn($y);
    $sep = ($x === 2 && $s ? " and " : ($y < 100 ? ($y ? " and " : '') : ', '));
    return $fnBase($n, $x) . $sep . $s;
};
$fnHundred = function ($n, $x) use (&$fn, &$fnBase) {
    $y = $n % (10 ** $x);
    $sep = ($y < 100 ? ($y ? ' and ' : '') : ', ');
    return ', ' . $fnBase($n, $x) . $sep . $fn($y);
};
$fn = function ($n) use (&$fn, $_1to19, $_teen, $number, &$fnOne, &$fnHundred) {
    switch ($n) {
        case 0:
            return ($number > 1 ? '' : 'zero');
        case $n < 20:
            return $_1to19[$n - 1];
        case $n < 100:
            return $_teen[($n / 10) - 2] . ' ' . $fn($n % 10);
        case $n < (10 ** 3):
            return $fnOne($n, 2);
    };
    for ($i = 4; $i < 27; ++$i) {
        if ($n < (10 ** $i)) {
            break;
        }
    }
    return ($i % 3) ? $fnHundred($n, $i - ($i % 3)) : $fnOne($n, $i - 3);
};
$number = 9223372036854775808;
$number = $fn((int)$number);
$number = str_replace(', , ', ', ', $number);
$number = str_replace(',  ', ', ', $number);
$number = str_replace('  ', ' ', $number);
$number = ltrim($number, ', ');

echo $number;
?>