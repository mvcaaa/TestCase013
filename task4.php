<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 30.01.2016 / 21:35
 *
 */

/**
 * @param array $argArrCoords
 * @return bool
 */
function isIntersect(...$argArrCoords)
{
	list($intK, $intB, $intX1, $intY1, $intX2, $intY2) = $argArrCoords;
	return ($intY1 > $intK * $intX1 + $intB && $intY2 > $intK * $intX2 + $intB) <= 0;;
}

assert(true, isIntersect(1, 2, 3, 4, 5, 6));
