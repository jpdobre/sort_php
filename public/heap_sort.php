<?php

$_HEAP_SIZE = 0;

function heap_sort(&$elements, $fn = 'comparison_function') {
  global $_HEAP_SIZE;

  _build_max_heap($elements, $fn);
  for ($i = sizeof($elements) - 1; $i >= 1; $i--) {
    _swap_element($elements[0], $elements[$i]);
    $_HEAP_SIZE--;
    _max_heapify($elements, 0, $fn);
  }
}

function _swap_element(&$a, &$b) {
  if ($a != $b) {
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;
  }
}

function _build_max_heap(&$elements, $fn) {
  global $_HEAP_SIZE;

  $_HEAP_SIZE = sizeof($elements);
  $end = floor(sizeof($elements)/2);
  for ($i = $end; $i >= 0; $i--) {
    _max_heapify($elements, $i, $fn);
  }
}

function _max_heapify(&$elements, $i, $fn) {
  global $_HEAP_SIZE;

  $l = _left_child($i);
  $r = _right_child($i);
  if ($l < $_HEAP_SIZE && $fn($elements[$l], $elements[$i])) {
    $largest = $l;
  } else {
    $largest = $i;
  }
  if ($r < $_HEAP_SIZE && $fn($elements[$r], $elements[$largest])) {
    $largest = $r;
  }
  if ($largest != $i) {
    _swap_element($elements[$i], $elements[$largest]);
    _max_heapify($elements, $largest, $fn);
  }
}

function _parent_node($i) {
  return floor($i/2);
}

function _left_child($i) {
  return 2*$i;
}

function _right_child($i) {
  return 2*$i + 1;
}

function comparison_function(&$a, &$b) {
  return $a > $b;
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
heap_sort($a);
echo "Melhor caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 10000);
$start_time = microtime(true);
heap_sort($a);
echo "Melhor caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRange(0, 100000);
$start_time = microtime(true);
heap_sort($a);
echo "Melhor caso 100000 " . (microtime(true) - $start_time) . "\n";

// Casos médios
$a = generateRandomArray(1000, 0, 10);
$start_time = microtime(true);
heap_sort($a);
echo "Caso Médio 1000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(10000, 0, 10);
$start_time = microtime(true);
heap_sort($a);
echo "Caso Médio 10000 " . (microtime(true) - $start_time) . "\n";

$a = generateRandomArray(100000, 0, 10);
$start_time = microtime(true);
heap_sort($a);
echo "Caso Médio 100000 " . (microtime(true) - $start_time) . "\n";

// Piores casos
$a = array_reverse(generateRange(1, 1001));
$start_time = microtime(true);
heap_sort($a);
echo "Pior caso 1000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 10001));
$start_time = microtime(true);
heap_sort($a);
echo "Pior caso 10000 " . (microtime(true) - $start_time) . "\n";

$a = array_reverse(generateRange(1, 100001));
$start_time = microtime(true);
heap_sort($a);
echo "Pior caso 100000 " . (microtime(true) - $start_time) . "\n";