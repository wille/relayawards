<?php

class Guard extends Award {

      public function get_name() {
            return "Guard";
      }

      public function get_icon() {
            return parent::get_icon();
      }

      public function get_description() {
            return "Is guard";
      }

      public function is_granted($relay) {
            return in_array("Guard", $relay->flags);
      }

}

?>
