<?php
class GuardProbability3 extends Award {
      public function get_name() {
            return "Guard Probability 3";
      }
      public function get_icon() {
            return "guard_prob_3.png";
      }
      public function get_description() {
            return "Over 1% mean guard probability fraction";
      }
      public function is_granted($relay) {
            return $relay->guard_probability >= 1;
      }
}
?>
