<?php

abstract class AbstractLevelAward extends Award {

      protected $level;
      protected $fraction;
      protected $points;
      protected $king;

      public function __construct($level, $fraction, $points, $king = false) {
            $this->level = $level;
            $this->fraction =  $fraction;
            $this->points = $points;
            $this->king = $king;
      }

      public function get_points() {
            return $this->points;
      }
}

?>
