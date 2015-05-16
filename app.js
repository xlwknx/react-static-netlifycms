var express = require('express');
var app = express();

app.use(express.static(__dirname + '/public'));

app.post('/account/signup', function (req, res) {
	res.status(400).json({
		"error": {
			"code": "30002"
		}
	});
	res.json({
		"id": 1,
		"type": 1,
		"email": "suhinin.dmitriy@gmail.com",
		"confirmed": false
	});
});

app.post('/account/signin', function (req, res) {
	//res.status(400).json({
		//"error": {
			//"code": "30002"
		//}
	//});

	return res.json({
		"auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"
	});
});

app.post('/account/signout', function (req, res) {
	res.end();
});

app.post('/account/reset', function (req, res) {
	//return res.status(400).json({
		//"error": {
			//"code": "30002"
		//}
	//});

	return res.json({
		"auth_token": "dbbbe6a906aa4d567531827beb66a2aadbbbe6a906aa4d567531827beb66a2aa"
	});
});

app.get('/application/list', function (req, res) {
	return res.json([
		{
			"id": 1,
			"name": "First Virgil Application",
			"description": "First amazing Virgil application",
			"url": "http://application.url.com",
			"key": "a7498f263b78e356e087e0e4152ef"
		}, {
			"id": 2,
			"name": "Another Virgil Application",
			"description": "Another amazing Virgil application",
			"url": "http://application.url.com",
			"key": "12398f263b78e356e0871234152ef"
		}
	]);
});

app.post('/application', function (req, res) {
	res.json({
		"id": 1,
		"name": "First Virgil Application",
		"description": "First amazing Virgil application",
		"url": "http://application.com",
		"key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
	});
});

app.put('/application/:id', function (req, res) {
	res.json({
		"id": 1,
		"name": "First Virgil Application",
		"description": "First amazing Virgil application",
		"url": "http://application.com",
		"key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
	});
});

app.get('/application/get/*', function (req, res) {
	res.json({
		"id": 1,
		"name": "First Virgil Application",
		"description": "First amazing Virgil application",
		"url": "http://application.com",
		"key": "a7498f263b78e356e087e0e4152efa82f266db6521ef2e76c29a19c8a3966bc8"
	});
});

app.delete('/application/:id', function (req, res) {
	res.end();
});

app.get('*', function (req, res) {
	res.sendfile(__dirname + '/front/dashboard/server-views/index.html');
});

app.listen(3000);
