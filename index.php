<?php
require_once "header.php";
require_once "inc/utils.php";
?>
            <div class="container">
                    <div class="row">
                          <div class="container">
<?php

require_once "relays.php";
require_once "awards/awards.php";

$relays = Relays::query_relays(htmlspecialchars($_GET["s"]));

if(!empty($_GET['s'])) {
      echo '<title> Search: ' . htmlspecialchars($_GET["s"]) . '</title>

		<table class="table">
                                      <thead>
                                          <tr>
                                                <th>Nickname</th>
                                                <th>Uptime</th>
                                                <th>Bandwidth</th>
                                                <th>Awards</th>
                                          </tr>
                                    </thead>
                                    <tbody>';
} else {
echo '<html>

<head>
<title>RelayAwards - Competition for Tor-relay operators! </title>
<link rel="shortcut icon" href="images/static/favicon.ico" />
<title>RelayAwards - </title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/roboto.css" rel="stylesheet" type="text/css">
      <link href="css/search.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
<style>
          body {
                  padding-top: 70px;
                font-family: "Roboto", sans-serif;
            }
</style>
</head>

      <body>

          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                <a class="navbar-brand" href="#">RelayAwards</a>
                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                          <li>
                              <a href="awards.php">Awards</a>
                          </li>
                           <li>
                              <a href="info.php">Information</a>
                          </li>

                        <li>
                              <a href="contact.php">Contact</a>
                          </li>

                      </ul>
                  </div>
              </div>
          </nav>
<center><h1>Welcome to RelayAwards <i class="fa fa-trophy" aria-hidden="true"></i> </h1>

RelayAwards is a competition for Tor-relay operators! Compete against your friends, your family or why not yourself?<p>
There are many awards to win. Some are easy, others are hard and some are <b>very</b> hard.
<div class="box">
  <div class="container-4">
    <form action="?" method="get">
    <input type="search" id="search" name="s" placeholder="Search..." />
    <button class="icon"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>';
}
foreach ($relays as $relay) {
      echo "<tr>";
      echo '<td><a href="relay.php?fp=' . $relay->fingerprint . '">' . $relay->nick . "</a></td>";

      echo "<td>" . format_uptime($relay) . "</td>";

      echo "<td>" . $relay->get_current_bandwidth() . "</td>";

      $granted = array();

      foreach ($awards as $award) {
            if ($award->is_granted($relay)) {
                  $granted[] = $award;
            }
      }

      $has_awards = count($granted) > 0;

      if ($has_awards) {
            echo "<td>";
            foreach ($granted as $award) {
                  echo '<a href="awards/awards.php?award=' . urlencode($award->get_name()) . '"><img src="images/rewards/' . $award->get_icon() . '" title="' . $award->get_description() . '"  alt="' . $award->get_name() . '" width=42px height=42px></a>';
            }
            echo "</td>";
      }

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
