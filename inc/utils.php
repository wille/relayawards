<?php

require_once "awards/award.php";
require_once "relays.php";

function get_points(&$relay) {
      if ($relay->data["points"]) {
            return $relay->data["points"];
      }

      $points = 0;
      global $awards;
      foreach ($awards as $award) {
            if ($award->is_granted($relay)) {
                  $points += $award->get_points();
            }
      }

      $relay->data["points"] = $points;

      return $points;
}

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

function format_uptime($relay) {
      $uptime = $relay->get_uptime();
      if (!$uptime) {
            $uptime = "n/a";
      } else {
            $uptime = $uptime["days"] . " days " . $uptime["hours"] . " hours";
      }

      return $uptime;
}

function print_relay_to_table($i, $relay) {
      echo "<tr>";
      echo "<td>" . ($i == 0 ? '<i class="fa fa-trophy"></i>' : ($i + 1)) . " (" . get_points($relay) . ")</td>";
      echo '<td><a href="relay.php?fp=' . $relay->fingerprint . '">' . $relay->nick . "</a></td>";

      echo "<td>" . format_uptime($relay) . "</td>";

      echo "<td>" . $relay->get_current_bandwidth() . "</td>";
      echo '<td><img src="images/flags/'. $relay->country . '.png"></td>';

      $granted = array();

      global $awards;
      foreach ($awards as $award) {
            if ($award->is_granted($relay)) {
                  $granted[] = $award;
            }
      }

      $has_awards = count($granted) > 0;

      echo "<td>";
      if ($has_awards) {
            foreach ($granted as $award) {
                  echo '<a href="awards/award.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" title="' . $award->get_description() . '" alt="' . $award->get_name() . '" width=32px height=32px></a>';
            }
      }

      echo "</td></tr>";
}

function table_relays($relays, $offset = 0, $length = 0) {
      function compare_points($a, $b) {
            $p = get_points($a);
            $p1 = get_points($b);

            if ($p == $p1) {
                  return 0;
            }

            return ($p > $p1) ? -1 : 1;
      }

      usort($relays, "compare_points");

      if ($offset != 0 || $length != 0) {
            $relays = array_slice($relays, $offset, $length);
      }

      for ($i = 0; $i < count($relays); $i++) {
            $relay = $relays[$i];

            print_relay_to_table($i, $relay);
      }
}
?>
