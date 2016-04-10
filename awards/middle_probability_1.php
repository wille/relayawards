<?php

class MiddleProbability1 extends Award {

      public function get_name() {
            return "Middle Probability 1";
      }

      public function get_icon() {
            return "middle_prob_1.png";
      }

      public function get_description() {
            return "Over 0.01% mean middle probability fraction";
      }

      public function is_granted($relay) {
            return $relay->middle_probability >= 0.01;
      }

}

?>
