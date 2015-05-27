# Load our requirements
require 'sinatra'
require 'erb'
require 'json'

# Setup the base path
# -- About This Path:
# -- This path uses query params. Currently available query params are as follows:
# -- 1. type - set the type of the chart
# -- 2. title - set the title of the chart
# -- 3. series - set the series data for the chart
get '/' do
	# Below, we're turning the query params into a symbol-based Hash
	route_params = params.each_with_object({}) { |(k,v), h| h[k.to_sym] = v }
	# Down here we're parsing the series param into a proper array
	route_params[:series] = JSON.parse(route_params[:series])
	# Now we're sending the route_params Hash to the ERB file for processing
	erb :index, :locals => route_params
end

# Setup the JSON path
# -- About This Path:
# -- This path takes a URI encoded JSON object and renders it as a chart.
# -- To learn more about URI encoding, check out https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURI
get '/json/:json' do
	# We're just passing the JSON object to the ERB file for processing
	erb :json, :locals => { :json => params[:json] }
end