<?php
require_once "header.php";
require_once "utils.php";
require_once "relays.php";
?>

<?php
$fp = $_GET["fp"];

if (!isset($fp)) {
      die("fp parameter not set");
}

$relays = Relays::query_relays(htmlspecialchars($fp));

if (count($relays) != 1) {
      die("More than one or no relays found");
}

$relay = $relays[0];

?>

      </body>
</html>
