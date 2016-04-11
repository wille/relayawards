<?php

class Uptime1y extends Award {

      public function get_name() {
            return "Uptime 5";
      }

      public function get_icon() {
            return "1_year_uptime.png";
      }

      public function get_description() {
            return "1 year of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 365;
      }

}

?>
