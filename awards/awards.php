<?php

abstract class Award {

      public abstract function get_name();

      public function get_icon() {
            return "404.png";
      }

      public abstract function get_description();
      public abstract function is_granted($relay);

}


include_once "blue_diamond.php";
include_once "red_diamond.php";

include_once "lightning_1.php";
include_once "lightning_2.php";
include_once "lightning_3.php";
include_once "lightning_4.php";

include_once "https_lover.php";
include_once "exotic.php";

include_once "consensus_weight_1.php";
include_once "consensus_weight_2.php";

include_once "exit_probability_1.php";
include_once "exit_probability_2.php";

include_once "middle_probability_1.php";
include_once "middle_probability_2.php";

include_once "unix.php";
include_once "guard.php";
include_once "alpha.php";

$awards = [
      new Red_Diamond(), new Blue_Diamond(),
      new Lightning5(), new Lightning10(), new Lightning25(), new Lightning50(),
      new Https_Lover(),
      new ConsensusWeight1(), new ConsensusWeight2(),
      new ExitProbability1(), new ExitProbability2(),
      new MiddleProbability1(), new MiddleProbability2(),
      new Exotic(),
      new Unix(),
      new Guard(),
      new Alpha()
];

if (isset($_GET["award"])) {
      foreach ($awards as $award) {
            if ($award->get_name() == htmlspecialchars(urldecode($_GET["award"]))) {
                  echo $award->get_description();
                  exit();
            }
      }
}
