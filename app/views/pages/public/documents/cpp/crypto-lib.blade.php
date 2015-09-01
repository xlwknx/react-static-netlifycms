@section('title')
Virgil | Developers | PHP | Crypto Library
@show


@section('content')
	@include('pages.public.documents.cpp.partial.header')
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>Crypto Library for PHP</h2>
				<h3 id="overview">Build</h3>
				<p>
				   This section describes how to build virgil C/C++ library in in a different environments.
				 </p>
				<h3 id="supported-platforms" >Unix-like OS / default compiler</h3>
				<ul>
				   <li><a href="http://www.cmake.org/">CMake</a> (accessible in command prompt). Minimum version: 2.8.</li>
				   <li><a href="http://git-scm.com/">Git </a>(accessible in command prompt).</li>
				   <li><a href="https://www.python.org/">Python</a> (accessible in command prompt). Modules: yaml, argparse. Minimum version: 2.6.</li>
				   <li><a href="http://www.swig.org/">SWIG</a> (accessible in command prompt). Minimum version: 3.0.</li>
				   <li><a href="http://php.net/">PHP</a> (accessible in command prompt). Minimum version: 5.4.</li>
				   <li>PHP Devel. Minimum version: same as PHP. Installation process is platform-dependent.</li>
				   <li><a href="https://phpunit.de/">PHPUnit</a> (accessible in command prompt). Minimum version: 4.5. 
				   This dependency is OPTIONAL and used to run unit tests.</li>
				</ul>		
				<h3 id="nuget">Build Steps</h3>
				<p>
				   1. Open terminal.
				</p>
				<p>
				   2. Clone project. git clone <b>https://github.com/VirgilSecurity/virgil.git</b>
				</p>
				<p>
				   3. Navigate to the project's folder <b>cd virgil_lib</b>
				</p>
				<p>
				   4. Create folder for the build purposes. <b>mkdir build</b>
				</p>
				<p>
				   5. Navigate to the "build" folder. <b>cd build</b>
				</p>
				<p>
				   6. Configure cmake. Note, replace "../install" path, if you want install library in different location. 
				   <b>cmake -DPLATFORM_NAME=PHP -DCMAKE_INSTALL_PREFIX=../install ..</b>
				</p>
				<p>
				   7. Build library. <b>make</b>
				</p>
				<p>
				   8. Install library. <b>make install</b>
				</p>				
			</div>
			<div class="col-md-3 scrollspy">
                    <ul class="nav hidden-xs hidden-sm dev-sidenav" data-spy="affix" data-offset-top="250" >      
			        <li class="title" role="presentation"><p>Crypto Library for C/C++</p></li>
			        <li role="presentation"><a href="#overview">Build</a></li>
				</ul>
			</div>
		</div>
	</div>
@stop
