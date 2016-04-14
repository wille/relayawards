<?php

class Uptime2y extends Award {

      public function get_name() {
            return "Uptime 6";
      }

      public function get_icon() {
            return "king.png";
      }

      public function get_description() {
            return "2 year of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 365 * 2;
      }

      public function get_points() {
            return 50;
      }
}

?>
