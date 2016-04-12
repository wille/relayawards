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

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]), false);

foreach ($relays as $relay) {
      if (!$relay->is_running()) {
            continue;
      }
      echo "<tr>";
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

      if ($has_awards) {
            echo "<td>";
            foreach ($granted as $award) {
                  echo '<a href="awards/awards.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" alt="' . $award->get_name() . '" width=32px height=32px></a>';
            }
            echo "</td>";
      }

      echo "</tr>";
}

?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </body>
</html>
