<?php

require_once "abstract_level.php";

abstract class GuardProbability extends AbstractLevelAward {

      public function get_name() {
            return "Guard Probability " . $this->level;
      }

      public function get_icon() {
            return $this->king ? "king.png" : "guard_prob_" . $this->level . ".png";
      }

      public function get_description() {
            return "Over " . $this->fraction . "% mean guard probability";
      }

      public function is_granted($relay) {
            return $relay->guard_probability >= $this->fraction;
      }
}

class GuardProbability1 extends GuardProbability {

      public function __construct() {
            parent::__construct(1, 0.001, 1);
      }
}

class GuardProbability2 extends GuardProbability {

      public function __construct() {
            parent::__construct(2, 0.01, 2);
      }
}

class GuardProbability3 extends GuardProbability {

      public function __construct() {
            parent::__construct(3, 0.1, 5);
      }
}

class GuardProbability4 extends GuardProbability {

      public function __construct() {
            parent::__construct(4, 0.5, 10);
      }
}

class GuardProbability5 extends GuardProbability {

      public function __construct() {
            parent::__construct(5, 1, 20);
      }
}

class GuardProbability6 extends GuardProbability {

      public function __construct() {
            parent::__construct(6, 2, 30, true);
      }
}

?>
