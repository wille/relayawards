<?php

class Stable extends Award {

      public function get_name() {
            return "Stable";
      }

      public function get_icon() {
            return "stable.png";
      }

      public function get_description() {
            return "Is running a stable version of Tor";
      }

      public function is_granted($relay) {
            return strpos(strtolower($relay->platform), "alpha") === false;
      }

      public function get_points() {
            return 1;
      }
}

?>
