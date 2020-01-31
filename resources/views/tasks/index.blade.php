@extends('layouts.app')
@section('title', 'Index task')
@section('content')
    <div class="container">
        <div class="panel-body">
            @include('common.errors')
            <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">{{ trans('task.index.title') }}</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> {{ trans('task.index.addTask') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
