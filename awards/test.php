<?php

class Test extends Award {

      public function get_name() {
            return "Test";
      }

      public function get_icon() {
            return "test.png";
      }

      public function is_granted($relay) {
            return true;
      }

}

?>
