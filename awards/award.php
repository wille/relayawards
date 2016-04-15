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

include_once "uptime.php";

include_once "lightning.php";

include_once "https_lover.php";
include_once "exotic.php";

include_once "consensus_weight.php";
include_once "exit_probability.php";
include_once "middle_probability.php";
include_once "guard_probability.php";

include_once "ipv6.php";

$awards = [
      new Uptime1(), new Uptime2(), new Uptime3(), new Uptime4(), new Uptime5(), new Uptime6(), new Uptime7(),
      new Lightning1(), new Lightning2(), new Lightning3(), new Lightning4(), new Lightning5(), new Lightning6(),
      new Https_Lover(),
      new ConsensusWeight1(), new ConsensusWeight2(), new ConsensusWeight3(), new ConsensusWeight4(), new ConsensusWeight5(), new ConsensusWeight6(),
      new ExitProbability1(), new ExitProbability2(), new ExitProbability3(), new ExitProbability4(), new ExitProbability5(), new ExitProbability6(),
      new MiddleProbability1(), new MiddleProbability2(), new MiddleProbability3(), new MiddleProbability4(), new MiddleProbability5(), new MiddleProbability6(),
      new GuardProbability1(), new GuardProbability2(), new GuardProbability3(), new GuardProbability4(), new GuardProbability5(), new GuardProbability6(),
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
