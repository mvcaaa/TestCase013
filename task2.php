<?PHP
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 30.01.2016 / 20:25
 */


/**
 * Решение для конкретной задачи - при условии что у всех чисел, кроме одного есть пара
 *
 * @param array $arg_arr_input
 * @return int|null
 */
function get_uniq_xor(array $arg_arr_input = array())
{
	$int_result = 0;
	$int_cnt = count_or_exit($arg_arr_input);
	for ($int_i = 0; $int_i < $int_cnt; $int_i++)
		$int_result = $int_result ^ $arg_arr_input[$int_i];
	return ($int_result ? $int_result : null);
}

/**
 * @param array $arg_arr_input
 * @return int
 */
function count_or_exit(array $arg_arr_input = array())
{
	$int_cnt = count($arg_arr_input);
	if ($int_cnt)
		return $int_cnt;
	throw new BadFunctionCallException('Input array cannot be empty');
}

//Testing
$arr_source = array(3, 4, 3, 4, 5, 8, 9, 8, 9);
$arr_source_2 = array(10, 12, 10, 12, 15, 18, 19, 18, 19);
$arr_source_3 = array();


assert(5, get_uniq_xor($arr_source));
assert(5, get_uniq_xor($arr_source_2));
assert(73, get_uniq_xor($arr_source_3));
