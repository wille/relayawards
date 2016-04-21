<?php
const AMOUNT = 100;
const CACHE_FILE = "cache/cache.txt";

$title = "Top " . AMOUNT . " - RelayAwards";

require_once "awards/award.php";
require_once "inc/utils.php";
require_once "header.php";
?>

            <div class="row">
                 <div class="container">
                       <table class="table">
                             <thead>
                                 <tr>
                                        <th>Rank</th>
                                        <th>Nickname</th>
                                        <th>Uptime</th>
                                        <th>Bandwidth</th>
                                        <th>Country</th>
                                        <th>Awards</th>
                                 </tr>
                            </thead>
                            <tbody>
<?php
$relays = json_decode(file_get_contents(CACHE_FILE), true);

table_relays($relays, 0, AMOUNT, false, true);
?>
                            </tbody>
                      </table>
                      <?php echo "Last updated " . getTimeSince(file_get_contents("cache/time.txt")) . " ago"; ?>
                </div>
          </div>
   </div>
</body>
</html>
