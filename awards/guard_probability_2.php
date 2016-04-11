<?php
class GuardProbability2 extends Award {
      public function get_name() {
            return "Guard Probability 2";
      }
      public function get_icon() {
            return "guard_prob_2.png";
      }
      public function get_description() {
            return "Over 0.05% mean guard probability fraction";
      }
      public function is_granted($relay) {
            return $relay->guard_probability >= 0.05;
      }
}
?>
