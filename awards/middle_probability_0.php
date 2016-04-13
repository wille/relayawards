<?php

class MiddleProbability0 extends Award {

      public function get_name() {
            return "Middle Probability";
      }

      public function get_icon() {
            return "prob_0.png";
      }

      public function get_description() {
            return "Over 0.01% mean middle probability fraction";
      }

      public function is_granted($relay) {
            return $relay->middle_probability >= 0.01;
      }

}

?>
