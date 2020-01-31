@if (count($errors) > Config::get('app.zero'))
    <div class="alert alert-danger">
        <strong>{{ trans('errors.default') }}</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
