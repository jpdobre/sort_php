<?php

define('SENTINEL', 999999999999999999);

function _merge(&$elements, $p, $q, $r, $fn = 'comparison_function') {
  $n1 = $q - $p + 1;
  $n2 = $r - $q;

  $L = array();
  for ($i = 0; $i < $n1; $i++) {
    $L[$i] = $elements[$p + $i - 1];
  }
  $L[$n1] = SENTINEL;

  $R = array();
  for ($i = 0; $i < $n2; $i++) {
    $R[$i] = $elements[$q + $i];
  }
  $R[$n2] = SENTINEL;

  $i = 0; $j = 0;
  for ($k = $p; $k <= $r; $k++) {
    if ( call_user_func($fn, $L[$i], $R[$j]) ) {
      $elements[$k-1] = $L[$i];
      $i++;
    } else {
      $elements[$k-1] = $R[$j];
      $j++;
    }
  }
}


function merge_sort(&$elements, $p, $r, $fn = 'comparison_function') {
  if ($p < $r) {
    $q = floor(($p + $r) / 2);
    merge_sort($elements, $p, $q);
    merge_sort($elements, $q + 1, $r);
    _merge($elements, $p, $q, $r, $fn);
  }
}

function comparison_function(&$a, &$b) {
  return $a <= $b;
}

//Gera lista sequencial
function generateRange($start, $end, $step = 1) {
  $range = [];
  for ($i = $start; $i < $end; $i += $step) {
      $range[] = $i;
  }
  return $range;
}

//Gera lista randomica
function generateRandomArray($size, $min, $max) {
  $array = [];
  for ($i = 0; $i < $size; $i++) {
      $array[] = rand($min, $max);
  }
  return $array;
}

// Melhores casos
$a = generateRange(0, 1000);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Melhor caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 10000);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Melhor caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 100000);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Melhor caso 100000 " . (microtime(true) - $start_time) . "\n";

// Casos médios
$a = generateRandomArray(1000, 0, 10);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Caso Médio 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(10000, 0, 10);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Caso Médio 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(100000, 0, 10);
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Caso Médio 100000 " . (microtime(true) - $start_time) . "\n";

// Piores casos
$a = array_reverse(generateRange(1, 1001));
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Pior caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 10001));
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Pior caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 100001));
$start_time = microtime(true);
merge_sort($a, 1, sizeof($a));
echo "Merge - Pior caso 100000 " . (microtime(true) - $start_time) . "\n";