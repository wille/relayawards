<html>

      <body>

            <table>
                  <tr>
                        <th>Nickname</th>
                  </tr>

<?php

require_once "relays.php";

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

foreach ($relays as $relay) {
      echo "<tr><td>" . $relay->nick . "</td></tr>";
}

?>

            </table>

      </body>

</html>
