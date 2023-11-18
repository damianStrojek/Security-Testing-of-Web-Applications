<?php
  // get the go back link from the url
  $go_back_link = $_GET["location"];
  $source = './database_backup/advanced_sqli.db';  
  $destination = './advanced_sqli.db';
  if (!copy($source, $destination)) {
    echo "failed to copy $source to $destination...\n";
    header("Location: $go_back_link?error=3");
  }
  else {
    header("Location: $go_back_link?error=4");
  }
?>