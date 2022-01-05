const express = require('express')
const app = express()
const port = 3000

app.use(express.static('public'))
app.get('/', (req, res) => res.send('/project.html을 입력하세요.'))

//------------------------------ 공공데이터 API ------------------------------------

app.get('/api1', function(req, res){
  res.cookie('same-site-cookie', 'foo', { sameSite: 'lax' });
  res.cookie('cross-site-cookie', 'bar', { sameSite: 'none', secure: true });
  var request = require('request');
  var options = {
    'method': 'GET',
    'url': 'http://apis.data.go.kr/6260000/GoodPriceStoreService/getGoodPriceStore?serviceKey=7CnMjs%2BvUtCQZB5feF%2BocvQyliwg7iASHxOCs2kp0rrFEASEFuE33MonHzBuYD7ihBZktRNwu15cJpgBg%2FF7QA%3D%3D&numOfRows=5&pageNo=1&localeCd=41&resultType=json',
    'headers': {
    }
  };
  
  request(options, function (error, response) {
    if (error) throw new Error(error);
    res.send(response.body)
  });
})

app.get('/api2', function(req, res){
  res.cookie('same-site-cookie', 'foo', { sameSite: 'lax' });
  res.cookie('cross-site-cookie', 'bar', { sameSite: 'none', secure: true });
  var request = require('request');
  var options = {
    'method': 'GET',
    'url': 'http://apis.data.go.kr/6260000/GoodPriceStoreService/getGoodPriceStore?serviceKey=7CnMjs%2BvUtCQZB5feF%2BocvQyliwg7iASHxOCs2kp0rrFEASEFuE33MonHzBuYD7ihBZktRNwu15cJpgBg%2FF7QA%3D%3D&numOfRows=4&pageNo=1&localeCd=103&resultType=json',
    'headers': {
    }
  };
  
  request(options, function (error, response) {
    if (error) throw new Error(error);
    res.send(response.body)
  });
})


app.get('/api3', function(req, res){
  res.cookie('same-site-cookie', 'foo', { sameSite: 'lax' });
  res.cookie('cross-site-cookie', 'bar', { sameSite: 'none', secure: true });
  var request = require('request');
  var options = {
    'method': 'GET',
    'url': 'http://apis.data.go.kr/6260000/GoodPriceStoreService/getGoodPriceStore?serviceKey=7CnMjs%2BvUtCQZB5feF%2BocvQyliwg7iASHxOCs2kp0rrFEASEFuE33MonHzBuYD7ihBZktRNwu15cJpgBg%2FF7QA%3D%3D&numOfRows=4&pageNo=1&localeCd=31&resultType=json',
    'headers': {
    }
  };
  
  request(options, function (error, response) {
    if (error) throw new Error(error);
    res.send(response.body)
  });
})

//------------------------------ 네이버 API ------------------------------------

var client_id = 'KbWNe1vJ1voKNcgdT5C9'; // API Client - ID
var client_secret = 'mA9bH3JsqS'; // API Client- 비밀번호

app.get('/search/blog', function (req, res) {
  var api_url = 'https://openapi.naver.com/v1/search/blog?query=' + encodeURI(req.query.query);
  var request = require('request');
  var options = {
      url: api_url,
      headers: {'X-Naver-Client-Id':client_id, 'X-Naver-Client-Secret': client_secret}
   };
  request.get(options, function (error, response, body) {
    if (!error && response.statusCode == 200) {
      res.writeHead(200, {'Content-Type': 'text/json;charset=utf-8'});
      res.end(body);
    } else {
      res.status(response.statusCode).end();
    }
  });
});

app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`))
