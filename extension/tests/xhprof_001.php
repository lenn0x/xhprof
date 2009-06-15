<?php

include_once dirname(__FILE__).'/common.php';

function bar() {
  return 1;
}

function foo($x) {
  $sum = 0;
  for ($idx = 0; $idx < 2; $idx++) {
     $sum += bar();
  }
  return strlen("hello: {$x}");
}

// 1: Sanity test a simple profile run
xhprof_enable(XHPROF_FLAGS_EXTENDED_INFO);
foo("this is a test");
$output = xhprof_disable();

echo "Part 1: Default Flags\n";
print_canonical($output);
echo "\n";

// 2: Sanity test profiling options
xhprof_enable(XHPROF_FLAGS_CPU);
foo("this is a test");
$output = xhprof_disable();

echo "Part 2: CPU\n";
print_canonical($output);
echo "\n";

// 3: Sanity test profiling options
xhprof_enable(XHPROF_FLAGS_NO_BUILTINS);
foo("this is a test");
$output = xhprof_disable();

echo "Part 3: No Builtins\n";
print_canonical($output);
echo "\n";

// 4: Sanity test profiling options
xhprof_enable(XHPROF_FLAGS_MEMORY);
foo("this is a test");
$output = xhprof_disable();

echo "Part 4: Memory\n";
print_canonical($output);
echo "\n";

// 5: Sanity test combo of profiling options
xhprof_enable(XHPROF_FLAGS_MEMORY + XHPROF_FLAGS_CPU);
foo("this is a test");
$output = xhprof_disable();

echo "Part 5: Memory & CPU\n";
print_canonical($output);
echo "\n";

?>
