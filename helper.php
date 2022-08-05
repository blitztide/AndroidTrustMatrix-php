<?php
defined("matrix") or die();

function print_value($value)
{
	if ($value == null) $value = 0;
	$high = 8;
	$medium = 5;
	$low = 3;
	$str = '<td class="';

	if ($value >= $high){
		$class = 'high';
	}
	if ($value < $high and $value >= $medium){
		$class = 'medium';
	}
	if ($value < $medium and $value >= $low){
		$class = 'low';
	}
	if ($value < $low){
		$class = 'bad';
	}

	$returnVal = $str . $class . '">' . $value . '</td>'; 

	return $returnVal;
}
