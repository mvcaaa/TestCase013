<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 30.01.2016 / 21:35
 *
 * Определить пересекает ли прямая отрезок.
 * Дано: коэффициенты прямой $k и $b, координаты точек отрезка $x1, $y1, $x2, $y2.
 * Задача: Написать функцию isIntersect($k,$b, $x1, $y1, $x2, $y2), которая вернет TRUE, если прямая пересекает отрезок или FALSE, в противном случае.
 */

/**
 * @param array $argArrCoords
 * @return bool
 */
function isIntersect(...$argArrCoords)
{
	list($intK, $intB, $intX1, $intY1, $intX2, $intY2) = $argArrCoords;
	return ($intY1 > $intK * $intX1 + $intB && $intY2 > $intK * $intX2 + $intB) <= 0;
}