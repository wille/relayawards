<?php

function get_os_icon($relay) {
      $p = $relay->platform;

      if (strpos($p, "Linux") !== false) {
            return "os_linux";
      } else if (strpos($p, "Windows") !== false) {
            return "os_win8";
      } else if (strpos($p, "FreeBSD") !== false) {
            return "bsd_freebsd";
      } else if (strpos($p, "Mac") !== false) {
            return "os_macosx";
      } else {
            return "os_unknown";
      }
}






?>
