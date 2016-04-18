<?php

// Only sort up to AMOUNT (change in top.php as well)
const AMOUNT = 100;
const FILE = "top_cache.txt";

require_once "cache.php";

$relays = Relays::query_relays("", false);

$relays = sort_relays($relays, 0, AMOUNT);

$cached = cache_multiple($relays);

file_put_contents(FILE, json_encode($cached));

?>
