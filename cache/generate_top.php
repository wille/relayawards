<?php

// Only sort up to AMOUNT (change in top.php as well)
const AMOUNT = 100;
const FILE = "top_cache.txt";

require_once "cache.php";

echo "Downloading all relays...\n";
$relays = Relays::query_relays("", false);

echo "Sorting relays (0 -> " . AMOUNT . ")\n";
$relays = sort_relays($relays, 0, AMOUNT);

echo "Generating cache...\n";
$cached = cache_multiple($relays);

echo "Writing to " . FILE . "\n";
file_put_contents(FILE, json_encode($cached));

?>
