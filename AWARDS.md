# Awards

| Name | Requirements
| :--- | :-----
| ![Blue Diamond](images/awards/blue_diamond.png) Blue Diamond | 25 or more days of uptime
| ![Red Diamond](images/awards/red_diamond.png) Red Diamond | 10 or more days of uptime
| ![Lightning 1](images/awards/lightning_1.png) Lightning 1 | 5 MB/s or more in bandwidth speed
| ![Lightning 2](images/awards/lightning_1.png) Lightning 2 | 10 MB/s or more in bandwidth speed
| ![Lightning 3](images/awards/lightning_1.png) Lightning 3 | 25 MB/s or more in bandwidth speed
| ![Lightning 4](images/awards/lightning_1.png) Lightning 4 | 50 MB/s or more in bandwidth speed
| ![Exotic](images/awards/exotic.png) Exotic | Node placed in an exotic country
| ![HTTPS Lover](images/awards/404.png) HTTPS Lover | Uses port 80 or 443 in DirPort or ORPort

## Adding new awards

Create new file in [awards/](awards/) with the following template

```php
<?php
class Name extends Award {

      public function get_name() {
            return "Name";
      }

      public function get_icon() {
            return "icon.png";
      }

      public function get_description() {
            return "Description";
      }

      public function is_granted($relay) {
            return true;
      }

}
?>
```

Icon should be placed in [images/awards/](images/awards/)

Award class needs to be included and initiated in [awards/awards.php](awards/awards.php)
