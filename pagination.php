<?php 

$capture = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_FLOAT);

$pg = ($capture == '' ? 1 : $capture);

$limit = 10;

$start = ($pg * $limit) - $limit;

?>