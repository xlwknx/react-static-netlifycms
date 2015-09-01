@section('content')

@if(Session::has('error') || $errors)
<div class="alert alert-danger">
    <h4>
        <?=$errors->first('application_name'); ?>
        <?=$errors->first('application_description'); ?>
        <?=$errors->first('application_url'); ?>
    </h4>
</div>
@endif

<form method="post" action="/dashboard/application/update/{{$uuid}}">
    <input type="text" name="application_name" value="<?=(Input::old('application_name') ? Input::old('application_name') : $app->name )?>"/>
    <br />
    <input type="text" name="application_description" value="<?=(Input::old('application_description') ? Input::old('application_description') : $app->description )?>"/>
    <br />
    <input type="text" name="application_url" value="<?=(Input::old('application_url') ? Input::old('application_url') : $app->url )?>"/>
    <br />
    <input type="submit" value="Update a shitty app"/>
</form>
@stop