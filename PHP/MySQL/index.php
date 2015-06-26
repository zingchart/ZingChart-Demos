<!DOCTYPE html>
<html>
  <head>
    <title>MySQL Demo</title>
    <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
  </head>
  <body>
    <script>

      <?php
        /* ACTION REQUIRED: Enter your database information below */
        
        /* The host name in which the database is available */
        $host = "localhost"; 
        
        /* The database port number */
        $port = 3306;

        /* The username to connect to the database */
        $usernm = "root";

        /* The password associated with the username */
        $passwd = "root";

        /* The database to which to connect */
        $dbname = "demo_db";

        /* 
          The query to use. This query selects the `date` and `24h_average` columns
          from the `t_baverage` table and orders the results by date in an ascending order 
        */
        $query = "SELECT date, 24h_average from t_baverage ORDER BY date ASC";

        /* ---------------- */

        $date = []; // Array to hold our date values
        $series = []; // Array to hold our series values

        /* Connect to the database */
        $mysqli = new mysqli($host, $usernm, $passwd, $dbname, $port);
        if($mysqli->connect_error) {
          die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        /* Run the query */
        if ($result = $mysqli->query($query)) {

          /* Fetch the result row as a numeric array */
          while( $row = $result->fetch_array(MYSQLI_NUM)){

            /* Push the values from each row into the $date and $series arrays */
            array_push($date, $row[0]);
            array_push($series, $row[1]);
          }

          /* Convert each date value to a Unix timestamp, multiply by 1000 for milliseconds */
          foreach ($date as &$value){
            $value = strtotime( $value ) * 1000;
          }

          /* Free the result set */
          $result->close();
        }
      ?>
      /* Join the values in each array to create JavaScript arrays */
      var dateValues = [<?php echo join($date, ',') ?>];
      var seriesValues = [<?php echo join($series, ',') ?>];
      <?php

        /* Close database connection */
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
          "scale-x":{
            "values": dateValues,
            "transform":{
              "type":"date",
              "item":{
                "visible":false
              }
            }
          },
          "plot":{
            "line-width":1
          },
          "series":[
            {
              "values":seriesValues
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