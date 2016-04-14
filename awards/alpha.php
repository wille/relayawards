<?php

class Alpha extends Award {

      public function get_name() {
            return "Alpha";
      }

      public function get_icon() {
            return "alpha.png";
      }

      public function get_description() {
            return "Is running an alpha version of Tor";
      }

      public function is_granted($relay) {
            return strpos($relay->platform, "Alpha") !== false;
      }

      public function get_points() {
            return 1;
      }
}

?>
