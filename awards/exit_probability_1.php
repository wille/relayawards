<?php

class ExitProbability1 extends Award {

      public function get_name() {
            return "Exit Probability 1";
      }

      public function get_icon() {
            return parent::get_icon();
      }

      public function get_description() {
            return "Over 0.01% mean exit probability fraction";
      }

      public function is_granted($relay) {
            return $relay->exit_probability >= 0.01;
      }

}

?>
