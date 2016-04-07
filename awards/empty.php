<?php

class Empty extends Award {

      public function get_name() {
            return "";
      }

      public function get_icon() {
            return "";
      }

      public function get_description() {
            return "";
      }

      public function is_granted($relay) {
            return false;
      }

}

?>
