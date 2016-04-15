<?php

abstract class Award {

      public abstract function get_name();

      public function get_icon() {
            return "404.png";
      }

      public abstract function get_description();
      public abstract function is_granted($relay);

      public function get_points() {
            return 0;
      }

}
include_once "unix.php";
include_once "alpha.php";
include_once "https_lover.php";
include_once "exotic.php";

include_once "uptime10.php";
include_once "uptime20.php";
include_once "uptime50.php";
include_once "uptime150.php";
include_once "uptime1y.php";
include_once "uptime2y.php";

include_once "lightning.php";

include_once "https_lover.php";
include_once "exotic.php";

include_once "consensus_weight_1.php";
include_once "consensus_weight_2.php";

include_once "exit_probability.php";

include_once "middle_probability.php";

include_once "guard_probability_1.php";
include_once "guard_probability_2.php";
include_once "guard_probability_3.php";
include_once "guard_probability_4.php";

include_once "ipv6.php";

$awards = [
      new Uptime10(), new Uptime20(), new Uptime50(), new Uptime150(), new Uptime1y(), new Uptime2y(),
      new Lightning1(), new Lightning2(), new Lightning3(), new Lightning4(), new Lightning5(), new Lightning6(),
      new Https_Lover(),
      new ConsensusWeight1(), new ConsensusWeight2(),
      new ExitProbability1(), new ExitProbability2(), new ExitProbability3(), new ExitProbability4(), new ExitProbability5(), new ExitProbability6(),
      new MiddleProbability1(), new MiddleProbability2(), new MiddleProbability3(), new MiddleProbability4(), new MiddleProbability5(), new MiddleProbability6(),
      new ExitProbability1(), new ExitProbability2(), new ExitProbability3(), new ExitProbability4(),
      new Exotic(),
      new Unix(),
      new Alpha(),
      new Ipv6()
];

if (isset($_GET["award"])) {
      foreach ($awards as $award) {
            if ($award->get_name() == htmlspecialchars(urldecode($_GET["award"]))) {
                  echo $award->get_description();
                  exit();
            }
      }
}
