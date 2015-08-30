@section('doc-header')
<div class="dev-nav">
    <div class="container">
        <div class="row visible-md visible-lg">
            <div class="col-md-2"><a href="/documents/csharp/<?= $reference; ?>" class="dev-lng csharp">.NET/C#</a></div>
            <div class="col-md-2"><a href="/documents/cpp/<?= $reference; ?>" class="dev-lng cpp">C/C++</a></div>
            <div class="col-md-2"><a href="/documents/php/<?= $reference; ?>" class="dev-lng php active">PHP</a></div>
            <div class="col-md-2"><a href="/documents/nodejs/<?= $reference; ?>" class="dev-lng nodejs disabled">Node.js</a></div>
            <div class="col-md-2"><a href="/documents/python/<?= $reference; ?>" class="dev-lng python disabled">Python</a></div>
            <div class="col-md-2"><a href="/documents/ruby/<?= $reference; ?>" class="dev-lng ruby disabled">Ruby</a></div>
        </div>
        <div class="row visible-xs visible-sm">
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/csharp/<?= $reference; ?>" class="dev-lng small active">.NET/C#</a>
                <a href="/documents/nodejs/<?= $reference; ?>" class="dev-lng small disabled">Node.js</a>
            </div>
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/cpp/<?= $reference; ?>" class="dev-lng small">C/C++</a>
                <a href="/documents/python/<?= $reference; ?>" class="dev-lng small disabled">Python</a>
            </div>
            <div class="col-sm-4 col-xs-4">
                <a href="/documents/php/<?= $reference; ?>" class="dev-lng small">PHP</a>
                <a href="/documents/ruby/<?= $reference; ?>" class="dev-lng small disabled">Ruby</a>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-default dev-navbar hidden-xs">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="@if($reference == 'quickstart') active @endif"><a href="/documents/php/quickstart">Quickstart</a></li>
                    <li class="@if($reference == 'keys-service') active @endif"><a href="/documents/php/keys-service" >Keys Services</a></li>                    
                    <li class="@if($reference == 'keys-private-service') active @endif"><a href="/documents/php/keys-private-service" >Private Keys Service</a></li>
                    <li class="@if($reference == 'crypto-lib') active @endif"><a href="/documents/php/crypto-lib" >Crypto Library</a></li>
                    <!--<li class="@if($reference == 'sdk') active @endif"><a href="/documents/php/sdk">SDK</a></li>-->
                    <li class="@if($reference == 'downloads') active @endif"><a href="/documents/php/downloads" >Downloads</a></li>
                </ul>    
            </div>
        </nav>
        <div class="list-group visible-xs">
            <a href="/documents/php/quickstart" class="list-group-item @if($reference == 'quickstart') active @endif">Quickstart</a>
            <a href="/documents/php/keys-service" class="list-group-item @if($reference == 'keys-service') active @endif">Keys Services</a>                
            <a href="/documents/php/keys-private-service" class="list-group-item @if($reference == 'keys-private-service') active @endif">Private Keys Service</a>
            <a href="/documents/php/crypto-lib" class="list-group-item @if($reference == 'crypto-lib') active @endif">Crypto Library</a>
            <!--<a href="/documents/php/sdk" class="list-group-item @if($reference == 'sdk') active @endif">SDK</a>-->
            <a href="/documents/php/downloads" class="list-group-item @if($reference == 'downloads') active @endif">Downloads</a>
        </div>
    </div>
</div>
@show