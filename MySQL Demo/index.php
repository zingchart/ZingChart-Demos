<!DOCTYPE html>
<html>
  <head>
    <title>MySQL Demo</title>
    <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
  </head>
  <body>
    <script>

      <?php
        // ACTION REQUIRED: Enter your database information below
        $host = "my_host";
        $usernm = "my_username";
        $passwd = "my_password";
        $dbname = "my_database";
        $query = "SELECT * from my_table"; // Returns all records from my_table
        $colname = "my_colname";

        $mysqli = new mysqli($host, $usernm, $passwd, $dbname);
        if($mysqli->connect_error) {
          die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        $result = $mysqli->query($query);
        while( $row = $result->fetch_array(MYSQLI_ASSOC)){
          $data[] = $row[$colname];
        }
      ?>
      var aData = [<?php echo join($data, ',') ?>];
      <?php
        $mysqli->close(); 
      ?>
    </script>
    <script>
    window.onload=function(){
      zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
        data:{
          "type":"line",
          "title":{
            "text":"Data Pulled from MySQL Database"
          },
          "plot":{
            "line-width":1
          },
          "series":[
            {
              "values":aData
            }
          ]
        }
      });
    };
    </script>

    <div class="row">
      <div class="small-12 columns">
      <h1>Database Data</h1>
      <div id="myChart"></div>
      </div>
    </div>
  </body>
</html>