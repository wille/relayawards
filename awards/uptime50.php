<?php

class Uptime50 extends Award {

      public function get_name() {
            return "Uptime 3";
      }

      public function get_icon() {
            return "50_days_uptime.png";
      }

      public function get_description() {
            return "50 days of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 50;
      }

      public function get_points() {
            return 3;
      }
}

?>
