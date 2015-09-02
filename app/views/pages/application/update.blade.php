@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Update Application '<?=(Input::old('application_name') ? Input::old('application_name') : $app->name )?>'</h1>
                @if(Session::has('error') || $errors->any())
                <div class="alert alert-danger">
                    <?=$errors->first('application_name'); ?>
                    <?=$errors->first('application_description'); ?>
                    <?=$errors->first('application_url'); ?>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="/dashboard/application/update/{{$uuid}}">
                    <div class="form-group">
                        <label for="applicationNameInput">Application Name</label>
                        <input type="text" class="form-control" name="application_name" id="applicationNameInput" placeholder="Name" value="<?=(Input::old('application_name') ? Input::old('application_name') : $app->name )?>" >
                      </div>
                      <div class="form-group">
                        <label for="applicationDescriptionInput">Application Description</label>
                        <input type="text" class="form-control" name="application_description" id="applicationDescriptionInput" placeholder="Description" value="<?=(Input::old('application_description') ? Input::old('application_description') : $app->description )?>">
                      </div>
                      <div class="form-group">
                        <label for="applicationUrlInput">Application URL</label>
                        <input type="text" class="form-control" name="application_url" id="applicationUrlInput" placeholder="Url" value="<?=(Input::old('application_url') ? Input::old('application_url') : $app->url )?>">
                      </div>
                    <input class="btn btn-primary btn-virgil" type="submit" value="UPDATE APPLICATION"/>
                </form>
            </div>
        </div>
    </div>
@stop