@section('content')

    @if(Session::has('error') || $errors->any())
    <div class="alert alert-danger">
        <h4>
            <?=$errors->first('application_name'); ?>
            <?=$errors->first('application_description'); ?>
            <?=$errors->first('application_url'); ?>
        </h4>
    </div>
    @endif

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