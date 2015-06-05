  @section('title')
      Virgil | Documents
  @show

  @section('content')

<style type="text/css">

  h1{
    color:white;
  }

  h3{
    color:#9B9B9B;
    margin-top: 10px;
  }

  .dev-lng {
    margin-top:40px;
  }

  .dev-lng img {
    width: 100px;
  }

  /*.dev-lng img.*/

  .dev-lng img:hover {
  }
    

  .middle-possition{
    margin-left: 50px;
    margin-right: 50px;
  }

</style>

<div class="container">
  <h1 class="text-center">Get started with Virgil Security</h1>
  <h3 class="text-center">Start building secure applications to your favorite language.</h3>
  <div class="dev-lng text-center">
    <a href="/documents/csharp/quickstart"><img src="/img/lng_csharp.png" /></a>
    <a href="/documents/cpp/quickstart"><img class="middle-possition" src="/img/lng_cpp.png" /></a>
    <a href="/documents/php/quickstart"><img src="/img/lng_php.png">
  </div>
  <div class="dev-lng text-center">
    <a href="/documents/nodejs/quickstart"><img src="/img/lng_nodejs.png" /></a>
    <a href="/documents/python/quickstart"><img class="middle-possition" src="/img/lng_python.png" /></a>
    <a href="/documents/ruby/quickstart"><img src="/img/lng_ruby.png" /></a>
  </div>
</div>

  @stop
