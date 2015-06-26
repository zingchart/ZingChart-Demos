## Node/Express > MySQL

This is an example of a Node/Express application that connects to a MySQL database and returns data formatted for ZingChart on a GET request to `localhost:3000/test`.

### Usage
1. Replace the `host`, `port`, `user`, `password`, and `database` options in the MySQL connection with your MySQL server information. 

2. Configure `queryString` to the desired query.

3. In formatData, add or remove fields to or from the `seriesData` object to fit the data being retrieved from your database. 

4. In the formatData loop, change the key names that are being pulled from each object in `dataArray` to fit your data.

5. On the command line, navigate to the `Node/MySQL` directory.

6. Run `node server.js` to start the Express server.

7. In your application, make a GET request to `localhost:3000/test` to retrieve your database data for use in a chart.