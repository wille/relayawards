<?php

require_once "abstract_level.php";

abstract class ExitProbability extends AbstractLevelAward {

      public function get_name() {
            return "Exit Probability " . $this->level;
      }

      public function get_icon() {
            return $this->king ? "king.png" : "exit_prob_" . $this->level . ".png";
      }

      public function get_description() {
            return "Over " . $this->fraction . "% mean exit probability fraction";
      }

      public function is_granted($relay) {
            return $relay->exit_probability * 100 >= $this->fraction;
      }
}

class ExitProbability1 extends ExitProbability {

      public function __construct() {
            parent::__construct(1, 0.001, 1);
      }
}

class ExitProbability2 extends ExitProbability {

      public function __construct() {
            parent::__construct(2, 0.01, 2);
      }
}

class ExitProbability3 extends ExitProbability {

      public function __construct() {
            parent::__construct(3, 0.1, 5);
      }
}

class ExitProbability4 extends ExitProbability {

      public function __construct() {
            parent::__construct(4, 0.5, 10);
      }
}

class ExitProbability5 extends ExitProbability {

      public function __construct() {
            parent::__construct(5, 1, 20);
      }
}

class ExitProbability6 extends ExitProbability {

      public function __construct() {
            parent::__construct(6, 2, 30, true);
      }
}

?>
