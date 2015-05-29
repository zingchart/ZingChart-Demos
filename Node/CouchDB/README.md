## Node/Express > CouchDB

[Apache CouchDB](http://couchdb.apache.org/) is a database that uses JSON for documents, JavaScript for MapReduce indexes, and regular HTTP for its API. This demo uses [Node](https://nodejs.org/), [Express](http://expressjs.com/), and [Nano](https://github.com/dscape/nano) to connect to a `test` CouchDB. If you do not have CouchDB installed, download it from the CouchDB site, start the database, and create a database called `test`

### Usage
1. Download or clone this repository.

2. Navigate to the `CouchDB` directory using the command line.

3. Run `npm install` to download and install all dependencies (Express, Nano, and ZingChart).

4. Run `node server.js` to automatically import the data from `test_data.json` and to start an Express app.

5. Navigate to localhost:3000 in your browser to view the chart created with the test data.