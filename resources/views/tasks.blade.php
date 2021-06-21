@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{ __('NewTask')}}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">{{ __('Task')}}</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name"  class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>{{ __('AddTask')}}
                                </button>
                            </div>
                        </div>
                        @include('common.checkSave')
                    </form>
                </div>
            </div>
            <div>
            </div>
            <!-- Current Tasks -->
            @if ($tasks ?? '')
                <div class="panel panel-default">
                    <div class="panel-heading">
                    {{ __('CurrentTasks')}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <thead>
                                <th>{{ __('Task')}}</th>
                                <th>&nbsp;</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                                @foreach ($tasks ?? '' as $task)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            <!-- TODO: Delete Button -->
                                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> 
                                                {{ __('Delete')}}
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
