<?php

require_once "abstract_level.php";

abstract class ConsensusWeight extends AbstractLevelAward {

      public function get_name() {
            return "Consensus Weight " . $this->level;
      }

      public function get_icon() {
            return $this->king ? "king.png" : "consensus_" . $this->level . ".png";
      }

      public function get_description() {
            return "Over " . $this->fraction . "% mean consensus weight fraction";
      }

      public function is_granted($relay) {
            return $relay->consensus_weight >= $this->fraction;
      }
}

class ConsensusWeight1 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(1, 0.001, 1);
      }
}

class ConsensusWeight2 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(2, 0.01, 2);
      }
}

class ConsensusWeight3 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(3, 0.1, 5);
      }
}

class ConsensusWeight4 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(4, 0.5, 10);
      }
}

class ConsensusWeight5 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(5, 1, 20);
      }
}

class ConsensusWeight6 extends ConsensusWeight {

      public function __construct() {
            parent::__construct(6, 2, 30, true);
      }
}

?>
