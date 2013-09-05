<?php

require 'config.php';

if (!mysql_connect($db_host, $db_user, $db_pass))
    die("Can't connect to database");

if (!mysql_select_db($db_name))
    die("Can't select database");

$result = mysql_query("SELECT * FROM my_apps");
if(!$result)
    die("Query failed.");

$fields_num = mysql_num_fields($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My CHC Applications</title>
  </head>
  <body>
    <h1>Welcome to My CHC Applications</h1>
    <table width="100%">
      <thead>
        <th>App Name</th>
        <th>Owner</th>
        <th>Category</th>
      </thead>
      <tbody>
        <?php while($row = mysql_fetch_object($result)): ?>
        <tr>
          <td>
            <?php 
              if($row->app_url) {
                echo "<a href=\"$row->app_url\">$row->app_name</a>";
              } else {
                echo $row->app_name;
              }
            ?>
          </td>
          <td><?php echo $row->app_owner ?></td>
          <td><?php echo $row->app_category ?></td>
        </tr>
        <?php endwhile; ?>

      </tbody>
    </table>
  </body>
</html>
