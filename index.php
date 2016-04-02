<?php
require_once "header.php";
require_once "inc/utils.php";
?>
            <div class="container">
                    <div class="row">
                          <div class="container">
                                <table class="table">
                                      <thead>
                                          <tr>
                                                <th>Country</th>
                                                <th>Nickname</th>
                                                <th>Fingerprint</th>
                                                <th>Uptime</th>
                                                <th>Bandwidth</th>
                                                <th>Address</th>
                                                <th>Platform</th>
                                                <th>Flags</th>
                                                <th>Awards</th>
                                          </tr>
                                    </thead>
                                    <tbody>
<?php

require_once "relays.php";
require_once "awards/awards.php";

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

foreach ($relays as $relay) {
      echo "<tr>";
      echo '<td><img src="images/flags/'. $relay->country . '.png">' . $relay->country_name . "</td>";
      echo "<td>" . $relay->nick . "</td>";
      echo '<td><a href="relay.php?fp=' . $relay->fingerprint . '">' . $relay->fingerprint . "</a></td>";

      echo "<td>" . format_uptime($relay) . "</td>";

      echo "<td>" . $relay->get_current_bandwidth() . "</td>";

      echo "<td>" . $relay->or_addresses[0] . "</td>";
      echo '<td><img src="images/os/' . get_os_icon($relay) . '">' . $relay->platform . "</td>";

      echo "<td>";
      foreach ($relay->flags as $flag) {
            echo '<img src="images/relay_flags/' . $flag . '.png" alt="' . $flag . '">';
      }
      echo "</td>";

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
                  echo '<a href="awards/awards.php?award=' . urlencode($award->get_name()) . '"><img src="images/awards/' . $award->get_icon() . '" alt="' . $award->get_name() . '"></a>';
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
