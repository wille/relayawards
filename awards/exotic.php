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
                  "za", "id", "ar", "si", "rs", "ee", "cl", "by", "mx", "am", "sa", "co", "kz", "im",
                  "al", "eg", "cr", "kg", "pa", "th", "cn", "lr", "eu", "ke", "ba", "cu", "mn", "pk",
                  "ag", "tj", "np", "ir", "gi", "kg", "ae", "ma"
            ];

            return in_array($relay->country, $exotic_countries);
      }

      public function get_points() {
            return 5;
      }
}

?>
