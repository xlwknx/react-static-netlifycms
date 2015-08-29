@section('title')
Virgil | Developers | C#/.NET | Crypto Library
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Crypto Library</h1>
            <h3 class="text-left">How to build and use the Virgil Crypto Library for the .NET platform</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.csharp.partial.header')
@show

@section('content')
<div class="dev">
	<div class="container">
		<div class="row">
			<div class="col-md-38 dev-content">
				<h2>Crypto Library for .NET</h2>
				<h3 id="overview">Overview</h3>
				<p>
				   Virgil.Crypto allows you to encrypt, decrypt, sign, and verify data from your Web, Desktop and Mobile applications. 
				   The Virgil.Crypto should be straightforward to use if you are comfortable with C# development.
				 </p>
				<h3 id="supported-platforms" >Supported Platforms</h3>
				<ul>
				   <li>.NET Framework 4+</li>
				   <li>Windows Store</li>
				   <li>Windows Phone 8+</li>
				   <li>Silverlight 5</li>
				   <li>Xamarin IOS/Android</li>
				</ul>		
				<h3 id="nuget">NuGet</h3>
				<p>
				   Virgil.Crypto is released as NuGet packages. Please see the NuGet package for the latest stable and pre-release versions. 
				   The Virgil.Crypto NuGet package contains everything you need for your .NET application.
				</p>
				<h3 id="build">Build for Windows</h3>
				<p>
				   This section describes how to build the Virgil.Crypto library on a Windows machine. 
				</p>
				<h4>Requirements</h4>
				<ul>
				   <li><a href="https://www.visualstudio.com/en-us/products/visual-studio-community-vs.aspx">Visual Studio 2013 +</a></li>
				   <li><a href="https://www.python.org/downloads/">Python Minimum version: 2.6.</a></li>
				   <li><a href="http://pyyaml.org/wiki/PyYAM">python-yaml</a></li>
				   <li><a href="http://www.swig.org/download.html">Swigwin Minimum version: 3.0</a></li>
				   <li><a href="http://www.cmake.org/download/">CMake Minimum version: 2.8.</a></li>
				</ul>	
				<h4>Preparation</h4>
				<p><b>python</b>, <b>swig</b> and <b>cmake</b> should be accessible through the command line. Please open a new terminal window and check each ...</p>
				<p>
				   Click Edit and prepend its value with the path to python installation folder, in my case it will look like 
				   this : C:\Python34\;C:\ProgramData\Oracle\Jav...
				</p>
				<p>Repeat these steps for both cmake and swig.</p>
				<p>
				   To check setup open new terminal window and type python, swig and cmake commands to make sure they are present in the system. 
				</p>
				<h4>Compilation</h4>
				<p>After you finished downloading the sources, navigate to the projects folder. Open a new terminal window in this folder and execute this lists of commands:</p>
				<pre><code>setlocal enabledelayedexpansion
rmdir /s /q build 
rmdir /s /q install

echo "Build for i386 architecture..."
call "C:\Program Files (x86)\Microsoft Visual Studio 12.0\Common7\Tools\VsDevCmd.bat"

mkdir build\x86
cd build\x86

cmake ../.. -DCMAKE_INSTALL_PREFIX=../../install -DCMAKE_BUILD_TYPE=Release -DPLATFORM_NAME=CSharp -G"NMake Makefiles"

nmake
nmake install

cd ../..

echo "Build for x86_64 architecture..."
call "C:\Program Files (x86)\Microsoft Visual Studio 12.0\VC\vcvarsall.bat" x86_amd64

mkdir build\x64
cd build\x64

cmake ../.. -DCMAKE_INSTALL_PREFIX=../../install -DCMAKE_BUILD_TYPE=Release -DPLATFORM_NAME=CSharp -G"NMake Makefiles"

nmake
nmake install

cd ../..</code></pre>
				<p>
				   If you have different version of Visual Studio installed or if it installed not in standard path, don't forget to change paths in command list. 
				   We recommend to store this command in a bat file for easier use.</p>
				<h4>Build Artifacts</h4>
				<p>
					After build is done, navigate to the [PROJECT_ROOT]\install\csharp\lib\ folder. 
					It will contain x64 and x86 versions of native DLL's and a C# wrapper DLL virgil.assembly.dll.
				</p>
			</div>
			<div class="col-md-10">
				<ul class="nav nav-pills nav-stacked dev-affix">
			        <li class="title" role="presentation">Crypto Library for .NET</li>
			        <li role="presentation"><a href="#overview">Overview</a></li>
			        <li role="presentation"><a href="#supported-platforms">Supported Platforms</a></li>
			        <li role="presentation"><a href="#nuget">NuGet</a></li>
			        <li role="presentation"><a href="#build">Build</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop
