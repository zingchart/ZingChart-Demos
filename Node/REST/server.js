var express = require('express');
var app = express();

app.get('/data', function(req, res){

    var randomData = {
        "value" : Math.floor(Math.random() * 100),
        "display_name" : randId()
    }
    res.send(randomData);


});

app.get('/setdata', function(req,res){
    var corpus = ['dogs','cats', 'birds', 'monkeys', 'fish'];
    var randomData = {
        "value" : Math.floor(Math.random() * 100),
        "description" : randId(),
        "series": corpus[Math.floor(Math.random()*(4+1))]
    };
    res.send(randomData);
});

function randId(){
   var text = "";
   var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   for(var i =0; i < 8; i++){
       text += possible.charAt(Math.floor(Math.random() * possible.length));
   }
   return text;
}


app.get('/js-transform', function(req,res){
    res.sendfile('./js-transform.html');
});

app.get('/api-update', function(req,res){
    res.sendfile('./api-update.html');
});

app.get('/api-update-ext', function(req,res){
    res.sendfile('./api-update-ext.html');
});

app.listen(3000, function(){
    console.log("Express listening on port : 3000");
})
