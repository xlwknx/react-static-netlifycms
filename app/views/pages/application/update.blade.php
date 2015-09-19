@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Update Application '<?=(Input::old('name') ? Input::old('name') : $application->name )?>'</h1>
                @include('partial.error')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="/dashboard/application/{{$application->uuid}}/update">
                    <div class="form-group">
                        <label for="applicationNameInput">Application Name</label>
                        <input type="text" class="form-control" name="name" id="applicationNameInput" placeholder="Name" value="<?=(Input::old('name') ? Input::old('name') : $application->name )?>" >
                      </div>
                      <div class="form-group">
                        <label for="applicationDescriptionInput">Application Description</label>
                        <input type="text" class="form-control" name="description" id="applicationDescriptionInput" placeholder="Description" value="<?=(Input::old('description') ? Input::old('description') : $application->description )?>">
                      </div>
                      <div class="form-group">
                        <label for="applicationUrlInput">Application URL</label>
                        <input type="text" class="form-control" name="url" id="applicationUrlInput" placeholder="Url" value="<?=(Input::old('url') ? Input::old('url') : $application->url )?>">
                      </div>
                    <input class="btn btn-primary btn-virgil" type="submit" value="UPDATE APPLICATION"/>
                </form>
            </div>
        </div>
    </div>
@stop