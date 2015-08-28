@section('title')
Virgil | Developers | C/C++ | Keys Services
@show

@section('header-block')
    <div class="dev-header-container">
        <div class="container">
            <h1 class="text-left">Virgil Keys Service</h1>
            <h3 class="text-left">This describes the resources that make up the official Virgil Services API's.</h3>        
        </div>        
    </div>    
    @include('pages.public.documents.cpp.partial.header')
@show

@section('content')
	@include('pages.public.documents.keys-services')
@stop
