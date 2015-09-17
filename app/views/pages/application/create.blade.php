@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Register your Application</h1>
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
                <form method="post" action="/dashboard/application/create">
                    <div class="form-group">
                        <label for="applicationNameInput">Application Name</label>
                        <input type="text" class="form-control" name="application_name" id="applicationNameInput" placeholder="Name" value="<?=Input::old('application_name')?>" >
                      </div>
                      <div class="form-group">
                        <label for="applicationDescriptionInput">Application Description</label>
                        <input type="text" class="form-control" name="application_description" id="applicationDescriptionInput" placeholder="Description" value="<?=Input::old('application_description')?>">
                      </div>
                      <div class="form-group">
                        <label for="applicationUrlInput">Application Web Site URL</label>
                        <input type="text" class="form-control" name="application_url" id="applicationUrlInput" placeholder="http://example.com" value="<?=Input::old('application_url')?>">
                      </div>
                    <input class="btn btn-primary btn-virgil" type="submit" value="REGISTER YOUR APPLICATION"/>
                </form>
            </div>
        </div>
    </div>


@stop