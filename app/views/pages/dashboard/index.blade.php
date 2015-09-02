@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>My Applications</h1>
        </div>
        <div class="col-md-3 text-right">
            <a class="btn btn-primary btn-block btn-virgil apps-create-button" href="/dashboard/application/create">CREATE APPLICATION</a>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-12">
            @if (count($applicationList))
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Token</th>
                        <th>Created</th>
                    </tr>
                    @foreach ($applicationList as $application)
                        <tr>
                            <td>
                                <a href="/dashboard/application/update/{{$application->uuid}}">{{$application->name}}</a>                                
                            </td>
                            <td>
                                {{$application->description}}
                            </td>
                            <td>
                                {{$application->token}}
                            </td>
                            <td>
                                {{$application->created_at}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
            No Application
            @endif
        </div>
    </div>
</div>
@stop