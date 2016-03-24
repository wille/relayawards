<?php

class Blue_Diamond extends Award {

      public function get_name() {
            return "Blue Diamond";
      }

      public function get_icon() {
            return "blue_diamond.png";
      }

      public function get_description() {
            return "25 days of uptime";
      }

      public function is_granted($relay) {
            return true;
      }

}

?>
