<?php
class Lightning75 extends Award {
      
      public function get_name() {
            return "Lightning 6";
      }
      public function get_icon() {
            return "king.png";
      }
      public function get_description() {
            return "Over 75 MB/s in bandwidth. You are the king!";
      }
      public function is_granted($relay) {
            $mb = pow(1024, 2) * 75;
            
            return $relay->bandwidth >= $mb;
      }
}
?>
