<?php

const FILE = "cache.txt";
require_once "cache.php";

echo "Downloading all relays...\n";
$relays = Relays::query_relays("");

if (count($relays) == 0) {
      die("No relays found, will not overwrite existing cache");
}

echo "Sorting relays (0 -> " . count($relays) . ")\n";
$relays = sort_relays($relays);

echo "Generating cache...\n";
$cached = cache_multiple($relays);

echo "Writing to " . FILE . "\n";
file_put_contents(FILE, json_encode($cached));

echo "Writing current time...\n";
update();

?>
