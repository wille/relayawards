<?php

include_once "awards/award.php";
include_once "relays.php";

function get_points(&$relay) {
      $points = 0;
      global $awards;
      foreach ($awards as $award) {
            if ($award->is_granted($relay)) {
                  $points += $award->get_points();
            }
      }

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






?>
