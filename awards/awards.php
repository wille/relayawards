<?php

abstract class Award {

      public abstract function get_name();
      public abstract function get_icon();
      public abstract function get_description();
      public abstract function is_granted($relay);

}


include_once "blue_diamond.php";
include_once "red_diamond.php";
include_once "lightning_1.php";
include_once "exotic.php";

$awards = [
      new Red_Diamond(),
      new Blue_Diamond(),
      new Lightning1(),
      new Exotic()
];

if (isset($_GET["award"])) {
      foreach ($awards as $award) {
            if ($award->get_name() == htmlspecialchars(urldecode($_GET["award"]))) {
                  echo $award->get_description();
                  exit();
            }
      }
}
