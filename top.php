<?php
const AMOUNT = 100;

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
$relays = Relays::query_relays("", true);

table_relays($relays, 0, AMOUNT);
?>
                            </tbody>
                      </table>
                </div>
          </div>
   </div>
</body>
</html>
