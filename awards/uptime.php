<?php

require_once "abstract_level.php";

abstract class Uptime extends AbstractLevelAward {

      public function get_name() {
            return "Uptime " . $this->level;
      }

      public function get_icon() {
            return $this->king ? "king.png" : "uptime_" . $this->level . ".png";
      }

      public function get_description() {
            return $this->fraction . " days of uptime";
      }

      public function is_granted($relay) {
            return $relay->get_uptime()["days"] >= $this->fraction;
      }
}

class Uptime1 extends Uptime {

      public function __construct() {
            parent::__construct(1, 10, 1);
      }
}

class Uptime2 extends Uptime {

      public function __construct() {
            parent::__construct(2, 20, 2);
      }
}

class Uptime3 extends Uptime {

      public function __construct() {
            parent::__construct(3, 50, 3);
      }
}

class Uptime4 extends Uptime {

      public function __construct() {
            parent::__construct(4, 100, 5);
      }
}

class Uptime5 extends Uptime {

      public function __construct() {
            parent::__construct(5, 150, 10);
      }
}

class Uptime6 extends Uptime {

      public function __construct() {
            parent::__construct(6, 365, 25);
      }
}

class Uptime7 extends Uptime {

      public function __construct() {
            parent::__construct(7, 365 * 2, 50, true);
      }
}

?>
