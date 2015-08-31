@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Applications</h2>
            @if (count($applicationList))
                <table class="table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Url</th>
                        <th>Token</th>
                        <th>Alias</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    @foreach ($applicationList as $application)
                        <tr>
                            <td>
                                {{$application->id}}
                            </td>
                            <td>
                                {{$application->name}}
                            </td>
                            <td>
                                {{$application->description}}
                            </td>
                            <td>
                                {{$application->url}}
                            </td>
                            <td>
                                {{$application->token}}
                            </td>
                            <td>
                                {{$application->alias}}
                            </td>
                            <td>
                                {{$application->created_at}}
                            </td>
                            <td>
                                {{$application->updated_at}}
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