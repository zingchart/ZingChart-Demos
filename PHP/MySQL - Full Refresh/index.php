<!DOCTYPE html>
<html>
  <head>
    <title>MySQL Demo - Full Refresh</title>
    <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
  </head>
  <body>
    <script>
    window.onload=function(){
      zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
        dataurl:'feed.php'
      });
    };
    </script>
    <h1>Database Data - Full Refresh</h1>
    <div id="myChart"></div>
  </body>
</html>
