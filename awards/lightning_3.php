<?php

class Lightning25 extends Award {

      public function get_name() {
            return "Lightning 3";
      }

      public function get_icon() {
            return "15_mb_speed.png";
      }

      public function get_description() {
            return "Over 15 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * 15;

            return $relay->bandwidth >= $mb;
      }

}

?>
