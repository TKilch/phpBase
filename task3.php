<?php
// Task 3:
// 1)

$a = 2;

echo pow($a,4);
echo "<br/>";
//2)

$first = 5;
$second = 3;

echo $first + $second;
echo "<br/>";
echo $first - $second;
echo "<br/>";
echo $first * $second;
echo "<br/>";
echo $first / $second;
echo "<br/>";
echo pow($first,$second);
echo "<br/>";
echo $first % $second;
echo "<br/>";

//3)

$third = '5';

echo $third + 1;
echo "<br/>";
echo $third - 1;
echo "<br/>";
echo $third / 2;
echo "<br/>";
echo $third * 2;
echo "<br/>";
echo pow($third,2);
echo "<br/>";
echo $third % 2;
echo "<br/>";
//Если один из операндов логического оператора может трактоваться как число,
// то оба операнда трактуются как числа.
// При этом пустая строка превращается в 0, который затем и сравнивается с нулем.

//1*)
$a = 'first';
$$a = 'second';
$$$a = 'third';
$$$$a = 'fourth';
$$$$$a = 'fifth';

echo $a;
echo "<br/>";
echo $$a;
echo "<br/>";
echo $$$a;
echo "<br/>";
echo $$$$a;
echo "<br/>";
echo $$$$$a;
echo "<br/>";