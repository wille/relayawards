<?php
class MiddleProbability3 extends Award {
      public function get_name() {
            return "Middle Probability 3";
      }
      public function get_icon() {
            return "middle_prob_3.png";
      }
      public function get_description() {
            return "Over 1% mean middle probability fraction";
      }
      public function is_granted($relay) {
            return $relay->middle_probability >= 1;
      }
}
?>
