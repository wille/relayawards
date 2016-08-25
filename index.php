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

      $continents = [
             "Europe" => ["AL","AD","AT","BY","BE","BA","BG","HR","CY","CZ","DK","EE","FO","FI","FR","DE","GI","GR","HU","IS","IE","IT","LV","LI","LT","LU","MK","MT","MD","MC","NL","NO","PL","PT","RO","RU","SM","RS","SK","SI","ES","SE","CH","UA","GB","VA","RS","IM","RS","ME"],
             "Africa" => ["DZ","AO","SH","BJ","BW","BF","BI","CM","CV","CF","TD","KM","CG","DJ","EG","GQ","ER","ET","GA","GM","GH","GW","GN","CI","KE","LS","LR","LY","MG","MW","ML","MR","MU","YT","MA","MZ","NA","NE","NG","ST","RE","RW","ST","SN","SC","SL","SO","ZA","SH","SD","SZ","TZ","TG","TN","UG","CD","ZM","TZ","ZW","SS","CD"],
             "Asia" => ["AF","AM","AZ","BH","BD","BT","BN","KH","CN","CX","CC","IO","GE","HK","IN","ID","IR","IQ","IL","JP","JO","KZ","KP","KR","KW","KG","LA","LB","MO","MY","MV","MN","MM","NP","OM","PK","PH","QA","SA","SG","LK","SY","TW","TJ","TH","TR","TM","AE","UZ","VN","YE","PS"],
             "North America" => ["AI","AG","AW","BS","BB","BZ","BM","VG","CA","KY","CR","CU","CW","DM","DO","SV","GL","GD","GP","GT","HT","HN","JM","MQ","MX","PM","MS","CW","KN","NI","PA","PR","KN","LC","PM","VC","TT","TC","VI","US","SX","BQ","SA"],
             "South America" => ["AR","BO","BR","CL","CO","EC","FK","GF","GY","GY","PY","PE","SR","UY","VE"]
      ];

      $search_array = explode("+", $search);

      foreach ($search_array as $s) {
            foreach ($to_search as $term) {
                  if (strpos(strtolower($term), strtolower($s)) !== false) {
                        return true;
                  }
            }
      }

      foreach ($continents as $continent) {
            if (strpos(strtolower($continent), strtolower($search)) !== false) {
                  foreach ($continent as $country) {
                        if ($relay["country"] == strtoupper($country)) {
                              return true;
                        }
                  }
            }
      }

      return false;
}

const MIN_SEARCH = 2;
const MAX_SEARCH = 25;

$search = $_GET["s"];
$can_search = isset($search) && strlen($search) >= MIN_SEARCH && strlen($search) <= MAX_SEARCH;

if (strpos($search, "+") !== false) {
      $search_array = explode("+", $search);

      foreach ($search_array as $s) {
            $s = trim($s);

            if (strlen($s) < MIN_SEARCH || strlen($s) > MAX_SEARCH) {
                  $can_search = false;
                  break;
            }
      }
}

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
