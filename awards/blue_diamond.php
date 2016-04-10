<?php

class Blue_Diamond extends Award {

      public function get_name() {
            return "Blue Diamond";
      }

      public function get_icon() {
            return "20_days_uptime.png";
      }

      public function get_description() {
            return "20 days of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= 20;
      }

}

?>
