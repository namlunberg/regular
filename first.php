<?php
header("Content-Type: text/plain");

// На '.', символы

$str = 'ahb acb aeb aeeb adcb axeb';
preg_match_all('/a.b/', $str, $out);
var_dump($out);

$str = 'aba aca aea abba adca abea';
preg_match_all('/a.{2,2}a/', $str, $out);
var_dump($out);

$str = 'aba aca aea abba adca abea';
preg_match_all('/a.[^c]a/', $str, $out);
var_dump($out);

// На '.', символы

// На '+', '*', '?', ()

$str = 'aa aba abba abbba abca abea';
preg_match_all('/ab+a/', $str, $out);
var_dump($out);

$str = 'aa aba abba abbba abca abea';
preg_match_all('/ab*a/', $str, $out);
var_dump($out);

$str = 'aa aba abba abbba abca abea';
preg_match_all('/ab?a/', $str, $out);
var_dump($out);

$str = 'ab abab abab abababab abea';
preg_match_all('/(ab)+/', $str, $out);
var_dump($out);

// На '+', '*', '?', ()

// На экранировку

$str = 'a.a aba aea';
preg_match_all('/a\.a/', $str, $out);
var_dump($out);

$str = '2+3 223 2223';
preg_match_all('/2\+3/', $str, $out);
var_dump($out);

$str = '23 2+3 2++3 2+++3 345 567';
preg_match_all('/2(\+)+3/', $str, $out);
var_dump($out);

$str = '23 2+3 2++3 2+++3 445 677';
preg_match_all('/2(\+)*3/', $str, $out);
var_dump($out);

$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
preg_match_all('/\*q+\+/', $str, $out);
var_dump($out);

$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
preg_match_all('/\*q*\+/', $str, $out);
var_dump($out);

// На экранировку

// На жадность

$str = 'aba accca azzza wwwwa';
$str = preg_replace('/a.+?a/', '!', $str);
var_dump($str);

// На жадность

// На {}

$str = 'aa aba abba abbba abbbba abbbbba';
preg_match_all('/ab{2,4}a/', $str, $out);
var_dump($out);

$str = 'aa aba abba abbba abbbba abbbbba';
preg_match_all('/ab{1,3}a/', $str, $out);
var_dump($out);

// На {}

// На \s, \S, \w, \W, \d, \D

$str = 'a1a a2a a3a a4a a5a aba aca';
preg_match_all('/a[\d]a/', $str, $out);
var_dump($out);

$str = 'a1a a22a a333a a4444a a55555a aba aca';
preg_match_all('/a[\d]+a/', $str, $out);
var_dump($out);

$str = 'aa a1a a22a a333a a4444a a55555a aba aca';
preg_match_all('/a[\d]*a/', $str, $out);
var_dump($out);

$str = 'avb a1b a2b a3b a4b a5b abb acb';
preg_match_all('/a[\D]+b/U', $str, $out);
var_dump($out);

$str = 'ave a#b a2b a$b a4b a5b a-b acb';
preg_match_all('/a[\W]+b/U', $str, $out);
var_dump($out);

$str = 'ave a#a a2a a$a a4a a5a a-a aca';
$str = preg_replace('/[\s]/', '!', $str);
var_dump($str);

// На \s, \S, \w, \W, \d, \D

// На [], '^' - не, [a-zA-Z], кириллицу

$str = 'aba aea aca aza axa';
preg_match_all('/a[bex]a/', $str, $out);
var_dump($out);

$str = 'a1a a2a a3a a4a a5a a6a a7a a8a a9a';
preg_match_all('/a[3-7]a/', $str, $out);
var_dump($out);

$str = 'aba aea aca aza axa a-a a#a';
preg_match_all('/a[^e^x^\s]a/', $str, $out);
var_dump($out);

$str = 'wйw wяw wёw wqw';
preg_match_all('/w[а-яё]w/u', $str, $out);
var_dump($out);

// На [], '^' - не, [a-zA-Z], кириллицу

// На '^', '$'

$str = 'aaa aaa aaa';
$str = preg_replace('/^aaa/', '!', $str);
var_dump($str);

$str = 'aaa aaa aaa';
$str = preg_replace('/aaa$/', '!', $str);
var_dump($str);

// На '^', '$'

// На '|'

$str = 'aeeea aeea aea axa axxa axxxa';
preg_match_all('/ae+a|ax+a/', $str, $out);
var_dump($out);

// На '|'