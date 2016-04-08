<?php

class Https_Lover extends Award {

      public function get_name() {
            return "HTTPS Lover";
      }

      public function get_description() {
            return "Uses port 80 or 443 in DirPort or ORPort";
      }

      private function is_correct_port($ip) {
            return strpos($ip, "80") !== false || strpos($ip, "443") !== false;
      }

      public function is_granted($relay) {
            foreach ($relay->or_addresses as $adr) {
                  if (is_correct_port($adr)) {
                        return true;
                  }
            }

            return is_correct_port($relay->dir_address);
      }

}

?>
