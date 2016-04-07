<?php

class ExitProbability2 extends Award {

      public function get_name() {
            return "Exit Probability 2";
      }

      public function get_icon() {
            return parent::get_icon();
      }

      public function get_description() {
            return "Over 0.05% mean exit probability fraction";
      }

      public function is_granted($relay) {
            return $relay->exit_probability >= 0.05;
      }

}

?>
