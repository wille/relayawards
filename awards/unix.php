<?php

class Unix extends Award {

      public function get_name() {
            return "Unix";
      }

      public function get_icon() {
            return "linux.png";
      }

      public function get_description() {
            return "Runs Linux or *BSD";
      }

      public function get_points() {
            return "1";
      }


      public function is_granted($relay) {
            $p = $relay->platform;
            return strpos($p, "Linux") !== false || strpos($p, "FreeBSD") !== false;
      }

}

?>
