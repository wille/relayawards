<?php

class Lightning1 extends Award {

      public function get_name() {
            return "Lightning";
      }

      public function get_icon() {
            return "1_mb_speed.png";
      }

      public function get_description() {
            return "Over 1 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2);

            return $relay->bandwidth >= $mb;
      }

      public function get_points() {
            return 1;
      }
}

?>
