## CouchDB/Nano

This demo assumes that you have a `test` database running on an instance of CouchDB. If you do not have CouchDB installed, download and install it from the [Apache CouchDB site](http://couchdb.apache.org/). Once installed, create a database named `test`.

1. Download or clone this repository.
2. Navigate to the `CouchDB` directory using the command line.
3. Run `npm install` to download and install all dependencies.
4. Run `node server.js` to automatically import the data from `test_data.json` and to start an Express app.
5. Navigate to localhost:3000 in your browser to view the chart created with the test data.