# Awards

| Name | Requirements
| :--- | :-----
| ![Blue Diamond](images/awards/blue_diamond.png) Blue Diamond | 25 or more days of uptime
| ![Red Diamond](images/awards/red_diamond.png) Red Diamond | 10 or more days of uptime
| ![Lightning 1](images/awards/lightning_1.png) Lightning 1 | 5 MB/s or more in bandwidth speed
| ![Lightning 10](images/awards/404.png) Lightning 10 | 10 MB/s or more in bandwidth speed
| ![Lightning 25](images/awards/404.png) Lightning 25 | 25 MB/s or more in bandwidth speed
| ![Lightning 50](images/awards/404.png) Lightning 50 | 50 MB/s or more in bandwidth speed
| ![Exotic](images/awards/exotic.png) Exotic | Node placed in an exotic country
| ![HTTPS Lover](images/awards/404.png) HTTPS Lover | Uses port 80 or 443 in DirPort or ORPort
| ![Consensus Weight 1](images/awards/404.png) Consensus Weight 1 | Over 0.01% mean consensus weight fraction
| ![Consensus Weight 2](images/awards/404.png) Consensus Weight 2 | Over 0.05% mean consensus weight fraction
| ![Exit Probability 1](images/awards/404.png) Exit Probability 1 | Over 0.01% mean exit probability fraction
| ![Exit Probability 2](images/awards/404.png) Exit Probability 2 | Over 0.05% mean exit probability fraction
| ![Middle Probability 1](images/awards/404.png) Middle Probability 1 | Over 0.01% mean middle probability fraction
| ![Middle Probability 2](images/awards/404.png) Middle Probability 2 | Over 0.05% mean middle probability fraction
| ![Alpha](images/awards/404.png) Alpha | Is running an alpha version of Tor
| ![Unix](images/awards/404.png) Unix | Runs Linux or *BSD 
| ![IPV6](images/awards/404.png) IPV6 | IPV6 support in DirAdr or ORAdr
| ![Guard](images/awards/404.png) Guard | Is guard

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
