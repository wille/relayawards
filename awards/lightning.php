<?php

require_once "abstract_level.php";

abstract class Lightning extends AbstractLevelAward {

      public function get_name() {
            return "Lightning " . $this->level;
      }

      public function get_icon() {
            return $king ? "king.png" : "speed_" . $this->level . ".png";
      }

      public function get_description() {
            return "Over " . $this->fraction . " MB/s";
      }

      public function is_granted($relay) {
            $mb = pow(1024, 2) * $this->fraction;

            return $relay->bandwidth >= $mb;
      }
}

class Lightning1 extends Lightning {

      public function __construct() {
            parent::__construct(1, 1, 1);
      }
}

class Lightning2 extends Lightning {

      public function __construct() {
            parent::__construct(2, 5, 2);
      }
}

class Lightning3 extends Lightning {

      public function __construct() {
            parent::__construct(3, 10, 5);
      }
}

class Lightning4 extends Lightning {

      public function __construct() {
            parent::__construct(4, 15, 10);
      }
}

class Lightning5 extends Lightning {

      public function __construct() {
            parent::__construct(5, 25, 20);
      }
}

class Lightning6 extends Lightning {

      public function __construct() {
            parent::__construct(6, 50, 30, true);
      }
}

?>
