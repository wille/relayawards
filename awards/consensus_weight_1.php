<?php
class ConsensusWeight1 extends Award {
      public function get_name() {
            return "Consensus Weight 1";
      }
      public function get_icon() {
            return parent::get_icon();
      }
      public function get_description() {
            return "Over 0.01% mean consensus weight fraction";
      }
      public function is_granted($relay) {
            return $relay->consensus_weight_fraction >= 0.01;
      }
}
?>
