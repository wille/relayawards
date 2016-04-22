<?php
$title = "RelayAwards - competition for Tor-relay operators!";

require_once "header.php";
require_once "awards/award.php";
require_once "inc/utils.php";

if(empty($_GET['s'])) {
        echo '<head><meta charset="UTF-8"><meta name="keywords" content="relayawards,tor,competition,relayawards.com,index,start,relay,node,compete,operators,win"><meta name="description" content="RelayAwards - A competition for Tor relay operators! - Welcome! | Index"></head>
                        <link href="css/search.css" rel="stylesheet">
                        <center><h1>Welcome to RelayAwards <i class="fa fa-trophy" aria-hidden="true"></i></h1><p>
                        RelayAwards is a competition for Tor-relay operators! Compete against your friends, your family or why not yourself?</br>
                        There are many awards to win. Some are easy, others are hard and some are <b>very</b> hard.</br>
                        Make sure to read about the different <a href="awards.php">awards</a> that you can win and how everything <a href="about.php">works</a>. Good luck!
                        <div class="box"> <center><form action="?" method="get">
                        <div class="container-4">
                        <input type="search" id="search" name="s" placeholder="Search..." autofocus />
                        <button class="icon"><i class="fa fa-search"></i></button>
                </center></form>
        </div>
</div>';
} else {
                    echo '<div class="row">
                          <div class="container">
                                <table class="table">
                                      <thead>
                                          <tr>
                                                <th>Rank</th>
                                                <th>Nickname</th>
                                                <th>Uptime</th>
                                                <th>Bandwidth</th>
                                                <th>Country</th>
                                                <th>Awards</th>
                                          </tr>
                                    </thead>
                                    <tbody>';
}
?>

<?php

require_once "relays.php";

function match($relay, $search) {
      $to_search = [
            $relay["nick"],
            $relay["fingerprint"],
            $relay["country"],
            $relay["country_name"],
      ];

      $search_array = explode("+", $search);

      foreach ($search_array as $s) {
            foreach ($to_search as $term) {
                  if (strpos(strtolower($term), strtolower($s)) !== false) {
                        return true;
                  }
            }
      }

      return false;
}

const MIN_SEARCH = 2;
const MAX_SEARCH = 25;

$search = $_GET["s"];
$can_search = isset($search) && strlen($search) >= MIN_SEARCH && strlen($search) <= MAX_SEARCH;

if ($can_search) {
      $search = htmlspecialchars($search);

      $relays = json_decode(file_get_contents("cache/cache.txt"), true);

      $sorted = [];

      for ($i = 0; $i < count($relays); $i++) {
            if (match($relays[$i], $search)) {
                  $sorted[] = $relays[$i];
            }
      }

      table_relays($sorted, 0, 0, false, true);
} else {
      echo "Minimum search is " . MIN_SEARCH . ", maximum is " . MAX_SEARCH;
}

if(!empty($_GET['s'])) {
      echo '</tbody>
      </table>
      Last updated ' . getTimeSince(file_get_contents("cache/time.txt")) . " ago";
}
?>


                        </div>
                  </div>
            </div>
      </body>
</html>
