<?php

class Contact extends Award {

      public function get_name() {
            return "Contact";
      }

      public function get_icon() {
            return parent::get_icon();
      }

      public function get_description() {
            return "Has an email address or BTC address in contact information";
      }

      public function is_granted($relay) {
            return false;
      }

}

?>
