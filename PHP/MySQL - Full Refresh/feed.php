<?php
    /* Database configuration */
    $host = "localhost";
    $port = 3306;
    $usernm = "root";
    $passwd = "root";
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
  
  /* Join the values in each array to create JavaScript formatted arrays */
  
  $dates  = '[' . join($date, ',') . ']';
  $values = '[' . join($series, ',') . ']';

  /* Echo out the entire chart JSON configuration */
    echo '
      {
        "type" : "line",
        "refresh" : {
          "type" : "full",
          "interval" : 10
        },
        "scale-x":{
          "values":' . $dates . ',
          "transform":{
            "type":"date",
            "all":"%m/%d/%y"
          } 
        },
        "series" : [
          {
            "values" : ' . $values . '
          }
        ]
      }';

    /* Close database connection */
    $mysqli->close(); 
  
  ?>
