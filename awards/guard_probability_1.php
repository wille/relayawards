<?php
class GuardProbability1 extends Award {

      public function get_name() {
            return "Guard Probability 1";
      }

      public function get_icon() {
            return "guard_prob_1.png";
      }

      public function get_description() {
            return "Over 0.01% mean guard probability fraction";
      }

      public function is_granted($relay) {
            return $relay->guard_probability >= 0.01;
      }

      public function get_points() {
            return 1;
      }
}
?>
