<?php
class MiddleProbability4 extends Award {

      public function get_name() {
            return "Middle Probability 4";
      }

      public function get_icon() {
            return "king.png";
      }

      public function get_description() {
            return "Over 2% mean middle probability fraction. You are the king!";
      }

      public function is_granted($relay) {
            return $relay->middle_probability >= 2;
      }
}
?>
