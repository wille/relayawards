<?php

class Lightning10 extends Award {

      public function get_name() {
            return "Lightning 2";
      }

      public function get_icon() {
            return "10_mb_speed.png";
      }

      public function get_description() {
            return "Over 10 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * 10;

            return $relay->bandwidth >= $mb;
      }

}

?>
