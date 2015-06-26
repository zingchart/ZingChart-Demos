var mysql = require('mysql');
var express = require('express');
var app = express();

// Create the connection to MySQL
var connection = mysql.createConnection({
  host: 'localhost',
  port: 3306,
  user: 'root',
  password: 'root',
  database: 'demo_db'
});
var queryString = 'SELECT * from test_table';

// Start the server
var server = app.listen(3000, function () {
	var port = server.address().port;
	console.log('Example app listening at http://localhost:%s', port);
});

// Configure our app to serve static files from the current directory
app.use(express.static('./'));

// Display `index.html` when `localhost:3000` is requested
app.get('/', function (req, res) {
  res.sendFile('./index.html', {root: './'});
});

// Send all records when there's a GET request to `localhost:3000/test`
app.get('/test', function (req, res) {
	connection.query(queryString, function(err, rows, fields) {
	  if (err) throw err;
	  res.send(formatData(rows));
	});
});

// Takes an array of objects and pushes the values of 4 properties into the 
// seriesData data store arrays.
var formatData = function(dataArray){
	// Empty data store
	var seriesData = {
		dates: [],
	  plot0: [],
	  plot1: [],
	  plot2: [],
	  plot3: []
	};

	// Push the data into the data store.
	for(var n = 0; n < dataArray.length; n++){
		seriesData['dates'].push((new Date(dataArray[n]['date'])).getTime());
	  seriesData['plot0'].push(parseFloat(dataArray[n]['plot0']));
	  seriesData['plot1'].push(parseFloat(dataArray[n]['plot1']));
	  seriesData['plot2'].push(parseFloat(dataArray[n]['plot2']));
	  seriesData['plot3'].push(parseFloat(dataArray[n]['plot3']));
	}

	return seriesData;
}

// Graceful shutdown handler 
var gracefulShutdown = function(){
	console.log("Received kill signal, shutting down gracefully.");
	// End MySQL connection
	connection.end(function() {
    console.log("Disconnected from MySQL.");
    server.close(function() {
	    console.log("Closed out remaining connections.");
	    process.exit()
	  });
  });
  
  // If after 10 seconds, exit anyway
	setTimeout(function() {
		console.error("Could not close connections in time, forcefully shutting down");
		process.exit()
	}, 10*1000);
}

// Listen for TERM signal. e.g. kill 
process.on ('SIGTERM', gracefulShutdown);

// Listen for INT signal. e.g. Ctrl-C
process.on ('SIGINT', gracefulShutdown); 
