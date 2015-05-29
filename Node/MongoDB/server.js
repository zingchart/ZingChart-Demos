var express = require('express');
var mongoose = require('mongoose');
var fs = require('fs');
var app = express();
var aData = null;

// Connect to the `test` Mongo database using Mongoose
mongoose.connect('mongodb://localhost/test');
var db = mongoose.connection;
var Document = null;
db.on('error', console.error.bind(console, 'Connection error:'));
db.once('open', function(callback){
	
	// Create a document schema
	var gaussSchema = mongoose.Schema({
		date: Date,
		series0: Number,
		series1: Number,
		series2: Number,
		series3: Number
	});

	// Associate the schema with the Document model
	Document = mongoose.model('Document', gaussSchema);

	// Get the data from test_data.json
	var aDocs = JSON.parse(fs.readFileSync('./test_data.json'));

	// Loop through and add the sample dataset to the database
	for (var n = 0; n < aDocs.length; n++){
		var docToAdd = new Document(aDocs[n]);
		docToAdd.save(function(err, docToAdd){
			if (err) return console.error(err);
		});
	}
});

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
	Document.find(function(err, records){
		aData = records;
		res.send(aData);
	});
});
