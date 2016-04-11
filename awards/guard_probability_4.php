<?php
class GuardProbability4 extends Award {
      public function get_name() {
            return "Guard Probability 4";
      }
      public function get_icon() {
            return "king.png";
      }
      public function get_description() {
            return "Over 2% mean guard probability fraction. You are the king!";
      }
      public function is_granted($relay) {
            return $relay->guard_probability >= 2;
      }
}
?>
