<?php

// Only sort up to AMOUNT (change in top.php as well)
const AMOUNT = 100;

require_once "cache.php";
require_once "../relays.php";
require_once "../awards/award.php";
require_once "../inc/utils.php";

$relays = Relays::query_relays("", false);

$relays = sort_relays($relays, 0, AMOUNT);

$cached = cache_multiple($relays);

file_put_contents("top_cache.txt", json_encode($cached));

?>
