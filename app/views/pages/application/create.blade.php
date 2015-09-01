@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Application</h1>
                @if(Session::has('error') || $errors)
                <div class="alert alert-danger">
                    <?=$errors->first('application_name'); ?>
                    <?=$errors->first('application_description'); ?>
                    <?=$errors->first('application_url'); ?>
                </div>
                @endif
            </div>
        </div>
    </div>

    <form method="post" action="/dashboard/application/create">
        <input type="text" name="application_name" value="<?=Input::old('application_name')?>"/>
        <br />
        <input type="text" name="application_description" value="<?=Input::old('application_description')?>"/>
        <br />
        <input type="text" name="application_url" value="<?=Input::old('application_url')?>"/>
        <br />
        <input type="submit" value="Create a shitty app"/>
    </form>
@stop