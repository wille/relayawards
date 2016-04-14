<?php
require_once "header.php";
require_once "relays.php";
require_once "inc/utils.php";
require_once "awards/award.php";
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
                  <h4>Rewards</h4>

                  <?php
                  $granted = array();

                  foreach ($awards as $award) {
                        if ($award->is_granted($relay)) {
                              $granted[] = $award;
                        }
                  }

                  $has_awards = count($granted) > 0;

                  if ($has_awards) {
                        foreach ($granted as $award) {
                              echo '<a href="awards/award.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" title="' . $award->get_description() . '" alt="' . $award->get_name() . '" width=62px height=62px></a>';
                        }
                  }
                  ?>

                  <h4>Nickname</h4>
                  <p><?php echo $relay->nick; ?></p>

                  <h4>Uptime</h4>
                  <p><?php echo format_uptime($relay); ?></p>

                  <h4>Platform</h4>
                  <p><?php echo $relay->platform; ?></p>

                  <h4>Country</h4>
                  <p><td><img src="images/flags/<?php echo $relay->country; ?>.png"><?php echo $relay->country_name; ?></td>

            </center>
      </body>
</html>
