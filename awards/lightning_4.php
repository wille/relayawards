<?php

class Lightning25 extends Award {

      public function get_name() {
            return "Lightning 4";
      }

      public function get_icon() {
            return "25_mb_speed.png";
      }

      public function get_description() {
            return "Over 25 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * 25;

            return $relay->bandwidth >= $mb;
      }

      public function get_points() {
            return 5;
      }
}

?>
