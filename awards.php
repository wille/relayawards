<?php
require_once "header.php";
require_once "awards/award.php";
echo '<title>' . $awards_title  . '</title>';
?>
        <title>RelayAwards - Awards</title>
            <div class="container">
                    <div class="row">
                         <div class="container">
                                <table class="table">
                                      <thead>
                                          <tr>
                                                <th>Award</th>
                                                <th>Description</th>
                                                <th>Points</th>
                                          </tr>
                                    </thead>
                                    <tbody>

<?php
foreach ($awards as $award) {
      echo "<tr>";

      echo '<td><img src="images/rewards/' . $award->get_icon() . '"></td>';
      echo "<td>" . $award->get_description() . "</td>";
      echo "<td>" . $award->get_points() . "</td>";

      echo "</tr>";
}
?>

                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </body>
</html>
