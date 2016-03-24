<?php

abstract class Award {

      public abstract function get_name();
      public abstract function get_icon();
      public abstract function get_description();
      public abstract function is_granted($relay);

}


include_once "blue_diamond.php";
include_once "red_diamond.php";

$awards = [
      new Red_Diamond(),
      new Blue_Diamond()
];
