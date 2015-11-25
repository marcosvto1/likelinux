<?php
header('Content-type:application/json; charset=utf-8');

$json = json_encode($contatos);

echo $json;
