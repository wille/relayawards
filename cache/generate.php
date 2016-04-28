<?php

const FILE = "cache.txt";
const EXOTIC_FILE = "exotic.txt";

const EXOTIC_LIMIT = 3;

require_once "cache.php";

function generate_exotic_countries($relays) {
      $exotic = [];

      foreach ($relays as $relay) {
            $country = $relay->country;

            if (isset($exotic[$country])) {
                  $exotic[$country]++;
            } else {
                  $exotic[$country] = 1;
            }
      }

      foreach ($exotic as $country => $count) {
            if ($count > EXOTIC_LIMIT) {
                  unset($exotic[$country]);
            }
      }

      return $exotic;
}

echo "Downloading all relays...\n";
$relays = Relays::query_relays("");

if (count($relays) == 0) {
      die("No relays found, will not overwrite existing cache");
}

echo "Generating exotic countries...\n";
$exotic = generate_exotic_countries($relays);
file_put_contents(EXOTIC_FILE, json_encode($exotic));

echo "Sorting relays (0 -> " . count($relays) . ")\n";
$relays = sort_relays($relays);

echo "Generating cache...\n";
$cached = cache_multiple($relays);

echo "Writing to " . FILE . "\n";
file_put_contents(FILE, json_encode($cached));

echo "Writing current time...\n";
update();

?>
