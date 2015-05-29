<!DOCTYPE html>
<html>
  <head>
    <title>MySQL Demo</title>
    <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
  </head>
  <body>
    <script>

      <?php
        // ACTION REQUIRED: Enter your database information below
        $host = "my_host"; // Your DB's hostname
        $usernm = "my_username"; // The username used to connect to MySQL
        $passwd = "my_password"; // The password associated with your username
        $dbname = "my_database"; // The name of the database to connect to
        $query = "SELECT * from my_table"; // The query that you'd like to use. This one returns all records from a table called `my_table`
        $colname = "my_colname"; // The header for the column that you want to retrieve data from.

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
    <h1>Database Data</h1>
    <div id="myChart"></div>
  </body>
</html>