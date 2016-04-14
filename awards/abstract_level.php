<?php

abstract class AbstractLevelAward extends Award {

      protected $level;
      protected $fraction;
      protected $king;

      public function __construct($level, $fraction, $king = false) {
            $this->level = $level;
            $this->fraction =  $fraction;
            $this->king = $king;
      }
}

?>
