<?php
require_once "header.php";
?>

<?php
$fp = $_GET["fp"];

if (!isset($fp)) {
      die();
}

$relays = Relays::query_relays(htmlspecialchars($fp));

if (count($relays) != 1) {
      die();
}

$relay = $relays[0];

?>

      </body>
</html>
