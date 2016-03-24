<?php

class Red_Diamond extends Award {

      public function get_name() {
            return "Red Diamond";
      }

      public function get_icon() {
            return "red_diamond.png";
      }

      public function get_description() {
            return "10 days of uptime";
      }

      public function is_granted($relay) {
            return true;
      }

}

?>
