<?php
require_once "header.php";
require_once "inc/utils.php";
?>
            <div class="container">
                  <form method="GET">
                        <div class="form-group">
                              <div class="col-xs-4">
                                    <input placeholder="Search" class="form-control input-sm" id="inputsm" type="text" name="s">
                              </div>
                        </div>
                  </form>
                    <div class="row">
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
                                    <tbody>
<?php

require_once "relays.php";
require_once "awards/award.php";

const MIN_SEARCH = 2;
const MAX_SEARCH = 25;

$search = $_GET["s"];
$can_search = isset($search) && strlen($search) >= MIN_SEARCH && strlen($search) <= MAX_SEARCH;

if ($can_search) {
      $relays = Relays::query_relays(htmlspecialchars($search), false);

      function compare_points($a, $b) {
            $p = get_points($a);
            $p1 = get_points($b);

            if ($p == $p1) {
                  return 0;
            }

            return ($p > $p1) ? -1 : 1;
      }

      usort($relays, "compare_points");

      for ($i = 0; $i < count($relays); $i++) {
            $relay = $relays[$i];

            echo "<tr>";
            echo "<td>" . ($i == 0 ? '<i class="fa fa-trophy"></i>' : ($i + 1)) . "</td>";
            echo '<td><a href="relay.php?fp=' . $relay->fingerprint . '">' . $relay->nick . "</a></td>";

            echo "<td>" . format_uptime($relay) . "</td>";

            echo "<td>" . $relay->get_current_bandwidth() . "</td>";
            echo '<td><img src="images/flags/'. $relay->country . '.png"></td>';

            $granted = array();

            foreach ($awards as $award) {
                  if ($award->is_granted($relay)) {
                        $granted[] = $award;
                  }
            }

            $has_awards = count($granted) > 0;

            echo "<td>";
            if ($has_awards) {
                  foreach ($granted as $award) {
                        echo '<a href="awards/awards.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" alt="' . $award->get_name() . '" width=32px height=32px></a>';
                  }
            }

            echo "</td></tr>";
      }
} else {
      echo "Minimum search is " . MIN_SEARCH . ", maximum is " . MAX_SEARCH;
}

?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </body>
</html>
