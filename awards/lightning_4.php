<?php

class Lightning50 extends Award {

      public function get_name() {
            return "Lightning 4";
      }

      public function get_icon() {
            return "lightning_1.png";
      }

      public function get_description() {
            return "Over 50 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * 50;

            return $relay->bandwidth >= $mb;
      }

}

?>
