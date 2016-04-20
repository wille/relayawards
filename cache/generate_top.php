<?php

// Only sort up to AMOUNT (change in top.php as well)
const AMOUNT = 100;
const FILE_TOP = "top_cache.txt";

require_once "cache.php";

echo "Downloading all relays...\n";
$relays = Relays::query_relays("");

if (count($relays) == 0) {
      die("No relays found, will not overwrite existing cache");
}

echo "Sorting relays (0 -> " . AMOUNT . ")\n";
$relays = sort_relays($relays, 0, AMOUNT);

echo "Generating cache...\n";
$cached = cache_multiple($relays);

echo "Writing to " . FILE_TOP . "\n";
file_put_contents(FILE_TOP, json_encode($cached));

?>
