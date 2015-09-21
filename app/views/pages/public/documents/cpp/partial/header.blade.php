@section('doc-header')
<div class="dev-nav">
    <div class="container">
        <div class="row visible-md visible-lg">
            <div class="col-md-2"><a href="/documents/csharp/quickstart" class="dev-lng csharp">.NET/C#</a></div>
            <div class="col-md-2"><a href="/documents/cpp/quickstart" class="dev-lng cpp active">C/C++</a></div>
            <div class="col-md-2"><a href="/documents/php/quickstart" class="dev-lng php">PHP</a></div>
            <div class="col-md-2"><a href="/documents/nodejs/quickstart" class="dev-lng nodejs">Node.js</a></div>
            <div class="col-md-2"><a href="/documents/python/quickstart" class="dev-lng python disabled">Python</a></div>
            <div class="col-md-2"><a href="/documents/ruby/quickstart" class="dev-lng ruby disabled">Ruby</a></div>
        </div>
        <div class="row visible-xs visible-sm">
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/csharp/quickstart" class="dev-lng small">.NET/C#</a>
                <a href="/documents/nodejs/quickstart" class="dev-lng small">Node.js</a>
            </div>
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/cpp/quickstart" class="dev-lng small active">C/C++</a>
                <a href="/documents/python/quickstart" class="dev-lng small disabled">Python</a>
            </div>
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/php/quickstart" class="dev-lng small">PHP</a>
                <a href="/documents/ruby/quickstart" class="dev-lng small disabled">Ruby</a>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-default dev-navbar hidden-xs">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="@if($reference == 'quickstart') active @endif"><a href="/documents/cpp/quickstart">Quickstart</a></li>
                    <li class="@if($reference == 'keys-service') active @endif"><a href="/documents/cpp/keys-service" >Keys Services</a></li>                    
                    <li class="@if($reference == 'keys-private-service') active @endif"><a href="/documents/cpp/keys-private-service" >Private Keys Service</a></li>
                    <li class="@if($reference == 'crypto-lib') active @endif"><a href="/documents/cpp/crypto-lib" >Crypto Library</a></li>
                    <!--<li class="@if($reference == 'sdk') active @endif"><a href="/documents/cpp/sdk">SDK</a></li>-->
                    <li class="@if($reference == 'downloads') active @endif"><a href="/documents/cpp/downloads" >Downloads</a></li>
                </ul>    
            </div>
        </nav>
        <div class="list-group visible-xs">
            <a href="/documents/cpp/quickstart" class="list-group-item @if($reference == 'quickstart') active @endif">Quickstart</a>
            <a href="/documents/cpp/keys-service" class="list-group-item @if($reference == 'keys-service') active @endif">Keys Services</a>                
            <a href="/documents/cpp/keys-private-service" class="list-group-item @if($reference == 'keys-private-service') active @endif">Private Keys Service</a>
            <a href="/documents/cpp/crypto-lib" class="list-group-item @if($reference == 'crypto-lib') active @endif">Crypto Library</a>
            <!--<a href="/documents/cpp/sdk" class="list-group-item @if($reference == 'sdk') active @endif">SDK</a>-->
            <a href="/documents/cpp/downloads" class="list-group-item @if($reference == 'downloads') active @endif">Downloads</a>
        </div>
    </div>
</div>
@show