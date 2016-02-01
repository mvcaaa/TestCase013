<?php
/**
 * Created by Astashov Andrey <a.astashov@straetus.com>
 * Date: 30.01.2016 / 20:49
 *
 * Дан текст. Заменить все email в этом тексте на '<a href=’mailto:...’>[email]</a>'. Например, 'пишите мне на vasya@gmail.com по любому вопросу' преобразуется в 'пишите мне на <a href=’mailto:vasya@gmail.com’>[email]</a> по любому вопросу'.
 * 
 */


/**
 * @param string $arg_str_input
 * @return mixed
 */
function email_replace(string $arg_str_input = "")
{
	$str_regex_pattern = '/(\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*)/';
	return preg_replace($str_regex_pattern, '<a href="mailto:$1">$1</a>', strip_tags($arg_str_input));
}

// Usage:
// echo(email_replace('пишите мне на vasya@gmail.com по любому вопросу'));