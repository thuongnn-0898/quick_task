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
        <div class="col-md-6">
            @if (count($tasks) > Config::get('app.zero'))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>{{ trans('task.index.table.name') }}</th>
                            <th>{{ trans('task.index.table.action') }}</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr id="task-{{ $task->id }}">
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete" data-id="{{ $task->id }}" data-url="{{ route('task.destroy', $task->id) }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
