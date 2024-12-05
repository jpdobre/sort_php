<?php

function quick_sort(&$elements, $p, $r, $fn = 'comparison_function') {
  if ($p < $r) {
    $q = _partition($elements, $p, $r, $fn);
    quick_sort($elements, $p, $q - 1, $fn);
    quick_sort($elements, $q + 1, $r, $fn);
  }
}

function _partition(&$elements, $p, $r, $fn) {
  $x = $elements[$r];
  $i = $p - 1;
  for ($j = $p; $j <= $r - 1; $j++) {
    if ( $fn($elements[$j], $x) ) {
      $i = $i + 1;
      _swap_element($elements[$i], $elements[$j]);
    }
  }
  _swap_element($elements[$i + 1], $elements[$r]);

  return $i + 1;
}

function _swap_element(&$a, &$b) {
  if ($a != $b) {
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;
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
quick_sort($a, 0, sizeof($a) - 1);
echo "Melhor caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 10000);
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Melhor caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 100000);
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Melhor caso 100000 " . (microtime(true) - $start_time) . "\n";

// Casos médios
$a = generateRandomArray(1000, 0, 10);
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Caso Médio 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(10000, 0, 10);
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Caso Médio 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(100000, 0, 10);
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Caso Médio 100000 " . (microtime(true) - $start_time) . "\n";

// Piores casos
$a = array_reverse(generateRange(1, 1001));
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Pior caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 10001));
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Pior caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 100001));
$start_time = microtime(true);
quick_sort($a, 0, sizeof($a) - 1);
echo "Pior caso 100000 " . (microtime(true) - $start_time) . "\n";