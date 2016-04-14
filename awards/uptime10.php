<?php

class Uptime10 extends Award {

      public function get_name() {
            return "Uptime 1";
      }

      public function get_icon() {
            return "10_days_uptime.png";
      }

      public function get_description() {
            return "10 days of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 10;
      }

      public function get_points() {
            return 1;
      }
}

?>
