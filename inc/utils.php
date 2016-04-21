<?php

include_once "awards/award.php";
include_once "relays.php";

function get_points(&$relay) {
      if (isset($relay->data["points"])) {
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
      $points = $relay["points"];
      $fp = $relay["fingerprint"];
      $nick = $relay["nick"];
      $country = $relay["country"];
      $uptime = $relay["uptime"];
      $bw = $relay["bandwidth"];

      echo "<tr>";
      echo "<td>" . ($i == 0 ? '<i class="fa fa-trophy"></i>' : ($i + 1)) . " (" . $points . ")</td>";
      echo '<td><a href="relay.php?fp=' . $fp . '">' . $nick . "</a></td>";

      echo "<td>" . $uptime . "</td>";

      echo "<td>" . $bw . "</td>";
      echo '<td><img src="images/flags/'. $country . '.png"></td>';

      $granted = $relay["granted"];

      $has_awards = count($granted) > 0;

      echo "<td>";

      if ($has_awards) {
            foreach ($granted as $award) {
                  $award = get_by_name($award);
                  echo '<a href="awards/award.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" title="' . $award->get_description() . '" alt="' . $award->get_name() . '" width=32px height=32px></a>';
            }
      }

      echo "</td></tr>";
}

function compare_points($a, $b) {
      $cache = is_array($a);
      $p = $cache ? $a["points"] : get_points($a);
      $p1 = $cache ? $b["points"] : get_points($b);

      if ($p == $p1) {
            return 0;
      }

      return ($p > $p1) ? -1 : 1;
}

function sort_relays($relays, $offset = 0, $length = 0) {
      usort($relays, "compare_points");

      if ($offset != 0 || $length != 0) {
            $relays = array_slice($relays, $offset, $length);
      }

      return $relays;
}

function table_relays($relays, $offset = 0, $length = 0, $sort = false) {
      if ($sort) {
            $relays = sort_relays($relays, $offset, $length);
      }

      for ($i = 0; $i < count($relays) && ($i == 0 || $i < $length); $i++) {
            $relay = $relays[$i];

            print_relay_to_table($i, $relay);
      }
}

function getTimeSince($eventTime)
{
    $totaldelay = time() - strtotime($eventTime);
    if($totaldelay <= 0)
    {
        return '';
    }
    else
    {
        $first = '';
        $marker = 0;
        if($years=floor($totaldelay/31536000))
        {
            $totaldelay = $totaldelay % 31536000;
            $plural = '';
            if ($years > 1) $plural='s';
            $interval = $years." year".$plural;
            $timesince = $timesince.$first.$interval;
            if ($marker) return $timesince;
            $marker = 1;
            $first = ", ";
        }
        if($months=floor($totaldelay/2628000))
        {
            $totaldelay = $totaldelay % 2628000;
            $plural = '';
            if ($months > 1) $plural='s';
            $interval = $months." month".$plural;
            $timesince = $timesince.$first.$interval;
            if ($marker) return $timesince;
            $marker = 1;
            $first = ", ";
        }
        if($days=floor($totaldelay/86400))
        {
            $totaldelay = $totaldelay % 86400;
            $plural = '';
            if ($days > 1) $plural='s';
            $interval = $days." day".$plural;
            $timesince = $timesince.$first.$interval;
            if ($marker) return $timesince;
            $marker = 1;
            $first = ", ";
        }
        if ($marker) return $timesince;
        if($hours=floor($totaldelay/3600))
        {
            $totaldelay = $totaldelay % 3600;
            $plural = '';
            if ($hours > 1) $plural='s';
            $interval = $hours." hour".$plural;
            $timesince = $timesince.$first.$interval;
            if ($marker) return $timesince;
            $marker = 1;
            $first = ", ";

        }
        if($minutes=floor($totaldelay/60))
        {
            $totaldelay = $totaldelay % 60;
            $plural = '';
            if ($minutes > 1) $plural='s';
            $interval = $minutes." minute".$plural;
            $timesince = $timesince.$first.$interval;
            if ($marker) return $timesince;
            $first = ", ";
        }
        if($seconds=floor($totaldelay/1))
        {
            $totaldelay = $totaldelay % 1;
            $plural = '';
            if ($seconds > 1) $plural='s';
            $interval = $seconds." second".$plural;
            $timesince = $timesince.$first.$interval;
        }
        return $timesince;

    }
}
?>
