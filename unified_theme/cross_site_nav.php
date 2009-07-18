<?php
  function build_link($site_name, $site_url) {
    $site = $_GET['site'];
    if (ereg("$site", $site_url)) {
      $cssid = " id='currentsite'";
    } else {
      $cssid = " class='sitenav'";
    }
    echo("<li><a$cssid href='$site_url'>$site_name</a></li>");
  }
?>

<ul class="sitenav">
  <?php build_link("tech corps ohio",    "http://techcorpsohio.org"); ?>
  <?php build_link("student tech corps", "http://studenttechcorps.org/moodle"); ?>
  <?php build_link("club tech corps",    "http://clubtechcorps.org"); ?>
  <?php build_link("tech corps volunteer", "http://techcorpsvolunteer.org"); ?>
</ul>
