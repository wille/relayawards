<?php
class ExitProbability4 extends Award {

      public function get_name() {
            return "Exit Probability 4";
      }

      public function get_icon() {
            return "king.png";
      }

      public function get_description() {
            return "Over 2% mean exit probability fraction";
      }

      public function is_granted($relay) {
            return $relay->exit_probability >= 2;
      }
}
?>
