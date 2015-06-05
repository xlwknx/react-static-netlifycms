@section('title')
Virgil | Documents | Charp | Quickstart
@show

@section('content')

	<style type="text/css">
		.dev-lng-description{
			margin-bottom: 40px;
			margin-left: 10px;
			margin-right: 10px;
		}
		.dev-menu{
			background-color: white;
		}
		.dev-navbar{
			background-color: white;
			border: 0px;
		}
		.dev-menu .nav>li>a {
  			font-size: 16px;
		}
	</style>

    <div class="container">
    	<div class="row dev-lng-description" >
    		<h1>Getting Started with C#/.NET</h1>
    		<h3>This documentation will help you get started developing secure applications.</h2>
    	</div>
    </div>
    <div class="dev-menu">
    	<div class="container">
    		<nav class="navbar navbar-default dev-navbar">
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     				<ul class="nav navbar-nav">
        				<li class="active"><a href="#">Quickstart <span class="sr-only">(current)</span></a></li>
        				<li><a href="#">Crypto Library</a></li>
        				<li><a href="#">SDK</a></li>
        				<li><a href="#">Keys Service</a></li>
        			</ul>
        		</div>
    		</nav>
    	</div>
    </div>

@stop
