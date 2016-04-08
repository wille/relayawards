<?php

class Ipv6 extends Award {

      public function get_name() {
            return "";
      }

      public function get_icon() {
            return "";
      }

      public function get_description() {
            return "";
      }

      public function is_granted($relay) {
            foreach ($relay->or_addresses as $adr) {
                  if (filter_var($adr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        return true;
                  }
            }

            return filter_var($relay->dir_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
;
      }

}

?>
