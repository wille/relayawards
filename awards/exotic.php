<?php

class Exotic extends Award {

      public function get_name() {
            return "Exotic";
      }

      public function get_icon() {
            return "exotic.png";
      }

      public function get_description() {
            return "Node placed in an exotic country";
      }

      public function is_granted($relay) {
            $exotic_countries = [

            ];

            return in_array($relay->country, $exotic_countries);
      }

}

?>
