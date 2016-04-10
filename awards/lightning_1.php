<?php

class Lightning5 extends Award {

      public function get_name() {
            return "Lightning 1";
      }

      public function get_icon() {
            return "5_mb_speed.png";
      }

      public function get_description() {
            return "Over 5 MB/s in bandwidth";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * 5;

            return $relay->bandwidth >= $mb;
      }

}

?>
