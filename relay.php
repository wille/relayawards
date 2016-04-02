<?php
require_once "header.php";
require_once "relays.php";
require_once "inc/utils.php";
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
            <center>
                  <h4>Nickname</h4>
                  <p><?php echo $relay->nick; ?></p>

                  <h4>Uptime</h4>
                  <p><?php echo format_uptime($relay); ?></p>

                  <h4>Running</h4>
                  <p><font color="<?php echo $relay->running ? "00ff00" : "ff0000"; ?>"><?php echo $relay->running ? "Running" : "Not running"; ?></font></p>
            </center>
      </body>
</html>
