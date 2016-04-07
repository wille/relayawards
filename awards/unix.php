<?php

class Unix extends Award {

      public function get_name() {
            return "Unix";
      }

      public function get_icon() {
            return parent::get_icon();
      }

      public function get_description() {
            return "Runs Linux or *BSD";
      }

      public function is_granted($relay) {
            return strpos($p, "Linux") !== false || strpos($p, "FreeBSD") !== false;
      }

}

?>
