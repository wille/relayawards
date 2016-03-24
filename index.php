<html>

      <body>

            <table>
                  <tr>
                        <th>Nickname</th>
                        <th>Fingerprint</th>
                        <th>Address</th>
                        <th>Platform</th>
                        <th>Awards</th>
                  </tr>

<?php

require_once "relays.php";
require_once "awards/awards.php";

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

foreach ($relays as $relay) {
      echo "<tr>";
      echo "<td>" . $relay->nick . "</td>";
      echo "<td>" . $relay->fingerprint . "</td>";
      echo "<td>" . $relay->or_addresses[0] . "</td>";
      echo "<td>" . $relay->platform . "</td>";

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
                  echo '<img src="' . $award->get_icon() . '">';
                  echo $award->get_name();
            }
            echo "</td>";
      }
      echo "</tr>";
}

?>

            </table>

      </body>

</html>
