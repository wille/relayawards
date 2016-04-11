<?php
class ExitProbability3 extends Award {

      public function get_name() {
            return "Exit Probability 3";
      }

      public function get_icon() {
            return "exit_prob_3.png";
      }

      public function get_description() {
            return "Over 1% mean exit probability fraction";
      }

      public function is_granted($relay) {
            return $relay->exit_probability >= 1;
      }
}
?>
