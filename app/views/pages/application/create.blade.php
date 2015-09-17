@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Application</h1>
                @include('partial.error')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="/dashboard/application/create">
                    <div class="form-group">
                        <label for="applicationNameInput">Application Name</label>
                        <input type="text" class="form-control" name="name" id="applicationNameInput" placeholder="Name" value="<?=Input::old('name')?>" >
                      </div>
                      <div class="form-group">
                        <label for="applicationDescriptionInput">Application Description</label>
                        <input type="text" class="form-control" name="description" id="applicationDescriptionInput" placeholder="Description" value="<?=Input::old('description')?>">
                      </div>
                      <div class="form-group">
                        <label for="applicationUrlInput">Application URL</label>
                        <input type="text" class="form-control" name="url" id="applicationUrlInput" placeholder="Url" value="<?=Input::old('url')?>">
                      </div>
                    <input class="btn btn-primary btn-virgil" type="submit" value="CREATE APPLICATION"/>
                </form>
            </div>
        </div>
    </div>


@stop