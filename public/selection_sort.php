<?php

function selectionSort($a) {
  for ($i = 0; $i < count($a) - 1; $i++) {
    $min_i = $i;
    for ($j = $i + 1; $j < count($a); $j++) {
      if ($a[$j] < $a[$min_i]) {
        $min_i = $j;
      }
    }
    if ($i != $min_i) {
      $temp = $a[$i];
      $a[$i] = $a[$min_i];
      $a[$min_i] = $temp;
    }
  }
  return $a;
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
selectionSort($a);
echo "Melhor caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 10000);
$start_time = microtime(true);
selectionSort($a);
echo "Melhor caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 100000);
$start_time = microtime(true);
selectionSort($a);
echo "Melhor caso 100000 " . (microtime(true) - $start_time) . "\n";

// Casos médios
$a = generateRandomArray(1000, 0, 10);
$start_time = microtime(true);
selectionSort($a);
echo "Caso Médio 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(10000, 0, 10);
$start_time = microtime(true);
selectionSort($a);
echo "Caso Médio 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(100000, 0, 10);
$start_time = microtime(true);
selectionSort($a);
echo "Caso Médio 100000 " . (microtime(true) - $start_time) . "\n";

// Piores casos
$a = array_reverse(generateRange(1, 1001));
$start_time = microtime(true);
selectionSort($a);
echo "Pior caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 10001));
$start_time = microtime(true);
selectionSort($a);
echo "Pior caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 100001));
$start_time = microtime(true);
selectionSort($a);
echo "Pior caso 100000 " . (microtime(true) - $start_time) . "\n";