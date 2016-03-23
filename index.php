<html>

      <body>

            <table>
                  <tr>
                        <th>Nickname</th>
                        <th>Fingerprint</th>
                        <th>Address</th>
                  </tr>

<?php

require_once "relays.php";

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

foreach ($relays as $relay) {
      echo "<tr>";
      echo "<td>" . $relay->nick . "</td>";
      echo "<td>" . $relay->fingerprint . "</td>";
      echo "<td>" . $relay->or_addresses[0] . "</td>";
      echo "</tr>";
}

?>

            </table>

      </body>

</html>
