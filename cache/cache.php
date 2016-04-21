<?php
require_once "../relays.php";
require_once "../awards/award.php";
require_once "../inc/utils.php";

function cache_multiple($relays) {
      $data = [];

      for ($i = 0; $i < count($relays); $i++) {
            $data[$i] = cache($relays[$i]);
      }

      return $data;
}

function cache($relay) {
      $data = [];

      $data["points"] = get_points($relay);
      $data["fingerprint"] = $relay->fingerprint;
      $data["nick"] = $relay->nick;
      $data["uptime"] = format_uptime($relay);
      $data["bandwidth"] = $relay->get_current_bandwidth();
      $data["country"] = $relay->country;
      $data["country_name"] = $relay->country_name;

      $granted = [];

      global $awards;
      foreach ($awards as $award) {
            if ($award->is_granted($relay)) {
                  $granted[] = $award->get_name();
            }
      }

      $data["granted"] = $granted;

      return $data;
}

function update() {
      file_put_contents("time.txt", time());
}

?>
