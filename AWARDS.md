# Awards

| Name | Requirements
| :--- | :-----
| ![Red Diamond](images/rewards/10_days_uptime.png) - | 10 or more days of uptime
| ![Blue Diamond](images/rewards/20_days_uptime.png) - | 20 or more days of uptime
| ![Blue Diamond](images/rewards/50_days_uptime.png) - | 50 or more days of uptime
| ![Lightning 1](images/rewards/5_mb_speed.png) Lightning 5 | 5 MB/s or more in bandwidth speed
| ![Lightning 10](images/rewards/10_mb_speed.png) Lightning 10 | 10 MB/s or more in bandwidth speed
| ![Lightning 15](images/rewards/15_mb_speed.png) Lightning 15 | 15 MB/s or more in bandwidth speed
| ![Lightning 25](images/rewards/25_mb_speed.png) Lightning 25 | 25 MB/s or more in bandwidth speed
| ![Lightning 50](images/rewards/50_mb_speed.png) Lightning 50 | 50 MB/s or more in bandwidth speed
| ![Exotic](images/rewards/exotic.png) Exotic | Node placed in an exotic country
| ![HTTPS Lover](images/rewards/404.png) HTTPS Lover | Uses port 80 or 443 in DirPort or ORPort
| ![Consensus Weight 1](images/rewards/404.png) Consensus Weight 1 | Over 0.01% mean consensus weight fraction
| ![Consensus Weight 2](images/rewards/404.png) Consensus Weight 2 | Over 0.05% mean consensus weight fraction
| ![Exit Probability 1](images/rewards/exit_prob_0.1%25.png) Exit Probability 1 | Over 0.1% mean exit probability fraction
| ![Exit Probability 2](images/rewards/exit_prob_0.5%25.png) Exit Probability 2 | Over 0.5% mean exit probability fraction
| ![Exit Probability 3](images/rewards/exit_prob_1%25.png) Exit Probability 3 | Over 1% mean exit probability fraction
| ![Middle Probability 1](images/rewards/middle_prob_1.png) Middle Probability 1 | Over 0.1% mean middle probability fraction
| ![Middle Probability 2](images/rewards/middle_prob_2.png) Middle Probability 2 | Over 0.5% mean middle probability fraction
| ![Middle Probability 3](images/rewards/middle_prob_3.png) Middle Probability 3 | Over 1% mean middle probability fraction
| ![Alpha](images/rewards/alpha.png) Alpha | Is running an alpha version of Tor
| ![Unix](images/rewards/linux.png) Unix | Runs Linux or *BSD 
| ![IPV6](images/rewards/IPv6.png) IPV6 | IPV6 support in DirAdr or ORAdr

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
