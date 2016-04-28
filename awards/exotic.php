<?php

class Exotic extends Award {

      public function get_name() {
            return "Exotic";
      }

      public function get_icon() {
            return "exotic.png";
      }

      public function get_description() {
            return "Node placed in an exotic country";
      }

      public function is_granted($relay) {
            if (!isset($GLOBALS["exotics"])) {
                  $exotic = json_decode(file_get_contents("cache/exotic.txt"), true);
                  $GLOBALS["exotics"] = $exotic;
            }

            return array_key_exists($relay->country, $GLOBALS["exotics"]);
      }

      public function get_points() {
            return 5;
      }
}

?>
