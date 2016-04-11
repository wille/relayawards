<?php

class Uptime150 extends Award {

      public function get_name() {
            return "Uptime 4";
      }

      public function get_icon() {
            return "150_days_uptime.png";
      }

      public function get_description() {
            return "150 days of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 150;
      }

}

?>
