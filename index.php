<html>

      <body>

            <table>
                  <tr>
                        <th>Country</th>
                        <th>Nickname</th>
                        <th>Fingerprint</th>
                        <th>Uptime</th>
                        <th>Address</th>
                        <th>Platform</th>
                        <th>Flags</th>
                        <th>Awards</th>
                  </tr>

<?php

require_once "relays.php";
require_once "awards/awards.php";

function get_os_icon($relay) {
      $p = $relay->platform;

      if (strpos($p, "Linux") !== false) {
            return "os_linux";
      } else if (strpos($p, "Windows") !== false) {
            return "os_win8";
      } else if (strpos($p, "FreeBSD") !== false) {
            return "bsd_freebsd";
      } else if (strpos($p, "Mac") !== false) {
            return "os_macosx";
      } else {
            return "os_unknown";
      }
}

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

foreach ($relays as $relay) {
      echo "<tr>";
      echo '<td><img src="images/flags/'. $relay->country . '.png">' . $relay->country_name . "</td>";
      echo "<td>" . $relay->nick . "</td>";
      echo "<td>" . $relay->fingerprint . "</td>";

      echo "<td>" . $relay->get_uptime() . "</td>";

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

            </table>

      </body>

</html>
