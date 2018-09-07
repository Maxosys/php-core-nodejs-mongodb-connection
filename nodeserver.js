var http    = require('http');
var url     = require('url');
var mv 		= require('mv');

var formidable = require('formidable');
var fs = require('fs');

var mongodb = require('mongodb');

var MongoClient = mongodb.MongoClient;
var conn = "mongodb://localhost:27017/";


http.createServer(function (req, res) {
   res.writeHead(200, {'Content-Type': 'text/html'});
   //res.setHeader('Content-Type', 'application/json');
  
 	var q = url.parse(req.url, true).query; 	

	// for get GET request or query string

	var tagname = q["tag"];
	
MongoClient.connect(conn,{ useNewUrlParser: true }, function(err, db) {
  if (err) throw err;

  	var dbo = db.db("php_node_mongo");
  	var txt = "Not Found";  	

  	if(tagname == "submit")
	{  	 	

		   var form = new formidable.IncomingForm();
   		      
		    form.parse(req, function (err, fields, files) {
		    	    
      		
      		// In case POST Method: Get Post Requests 

   		 	var myobj = { email_address: fields['email_address'], password: fields['password'], example_select: fields['example_select'], example_textarea: fields['example_textarea'], file_input: files.file_input.name };


						var oldpath = files.file_input.path;
						var newpath = 'upload/'+files.file_input.name;

						dbo.collection("customers").insertOne(myobj, function(err, res) {
						if (err) throw err;
						console.log("1 document inserted");
						db.close();
						});

						//fs.rename(oldpath, newpath, function (err) {

						// uncomment livne in case using file system

						mv(oldpath, newpath, function (err) {
						if (err) throw err;
						res.write('File uploaded and moved!');
						res.end();
						});
    		
    		});
    
  	}
  	else if(tagname == "update")
  	{

				var myquery = { address: "Valley 345" };
				var newvalues = { $set: {name: "Mickey", address: "Canyon 123" } };
				dbo.collection("customers").updateOne(myquery, newvalues, function(err, res) {
				if (err) throw err;
				console.log("1 document updated");
				db.close();
				});

  		  txt = "Successfully Updated"; 
		  res.end(txt);
  	}
  	else if(tagname == "view_list")
  	{
		/*	dbo.collection("customers").findOne({}, function(err, result) {
		if (err) throw err;
		console.log(result.name);
		db.close();
		});*/
		
		//res.writeHeader(200, {"Content-Type": "application/json"}); 
		res.writeHeader(200, {"Access-Control-Allow-Origin": "*"}); 

		// get All Record From Data Base

		dbo.collection("customers").find({}).toArray(function(err, result) {
		if (err) throw err;
			

			var json = JSON.stringify({data: result});
			txt = "Successfully Updated"; 
	   		res.end(json);
			db.close();
		});

	   
  	}
  	else if(tagname == "delete")
  	{	

  		 var myquery = { address: 'Mountain 21' };
  dbo.collection("customers").deleteOne(myquery, function(err, obj) {
    if (err) throw err;
    console.log("1 document deleted");
    db.close();
  });

  			txt = "Successfully Deleted"; 
		    res.end(txt);
  	}
  	else
  	{

  		res.end(txt);
  	}

}); 

}).listen(12345);
