## [New Repo Here](https://github.com/zingchart-demos/ruby-sinatra)

## Ruby > Sinatra

### Making a Chart from a URL
1. Download or clone this repo.

2. Navigate to the Sinatra directory

3. From inside that directory, run `ruby server.rb` in the command line.

4. Naviage to [this example](http://localhost:4567/?title=Chart&type=line&series=[[1,4,3,12,33,16,42,97]]) in your favorite browser. If a chart appears, you're set!

5. Change the `title` parameter in the path to be equal to `My+New+Chart`. The pluses get interpretted as spaces on the client side. Your path should now look like this...
`localhost:4567/?title=My+New+Chart&type=line&series=[[1,4,3,12,33,16,42,97]]`
Did the title update in your chart? Whoa! Cool!

6. Change the `type` parameter in the path to equal `bar`. The path should now look like this...
`localhost:4567/?title=My+New+Chart&type=bar&series=[[1,4,3,12,33,16,42,97]]`
Did the chart change to a bar chart? How slick!

7. Try adding a new array of values to the path. It should look like this...
`localhost:4567/?title=My+New+Chart&type=bar&series=[[1,4,3,12,33,16,42,97],[* NEW VALUES GO IN HERE *]]`
Your chart should now have a second series of data. Coolio!

### Using Already Formatted JSON
1. Download or clone this repo.

2. Navigate to the Sinatra directory

3. From inside that directory, run `ruby server.rb` in the command line.

4. Naviage to [this JSON example](http://localhost:4567/json/%7B%22type%22:%22bar%22,%22series%22:%5B%7B%22values%22:%5B35,42,67,89,25,34,67,85%5D%7D,%7B%22values%22:%5B28,57,43,56,78,99,67,28%5D%7D%5D%7D) in your favorite browser. If a chart appears, you're set!

5. Want to use your own chart? Copy your JSON (or any JSON your find [on our site](zingchart.com) and paste into [this form](http://meyerweb.com/eric/tools/dencoder/). It will take the JSON and [URI encode it](http://www.w3schools.com/tags/ref_urlencode.asp).

6. Replace the existing info after `localhost:4567/json/` with the formatted info. Navigate to that address.

7. If everything worked, you should have a new chart!
