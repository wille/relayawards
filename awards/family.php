<?php

require_once "abstract_level.php";

abstract class Family extends AbstractLevelAward {

      public function get_name() {
            return "Family " . $this->level;
      }

      public function get_icon() {
            return $this->king ? "king.png" : "family_" . $this->level . ".png";
      }

      public function get_description() {
            return "Over " . $this->fraction . " in effective family";
      }

      public function is_granted($relay) {
            return isset($relay->effective_family) && count($relay->effective_family) >= $this->fraction;
      }
}

class Family1 extends Family {

      public function __construct() {
            parent::__construct(1, 1, 1);
      }
}
