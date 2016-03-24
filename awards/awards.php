<?php

abstract class Award {

      public abstract function get_name();
      public abstract function get_icon();
      public abstract function is_granted($relay);

}


include_once "test.php";

$awards = [ new Test() ];
