@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Todo 
                <span class="pull-right"><a href="/todo" class="btn btn-success btn-xs">Todo List</a></span>
                </div>
    
         <div class="panel-body">
         @include('inc.message')
         <form class="form-horizontal" method="POST" action="{{ route('todo.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripation" class="col-md-4 control-label">Descripation</label>

                            <div class="col-md-6">
                                <textarea id="descripation"  class="form-control" name="descripation" required> {{ old('descripation') }} </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="due" class="col-md-4 control-label">Due</label>

                            <div class="col-md-6">
                                <input id="due" type="text" class="form-control" name="due" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Task Status </label>

                            <div class="col-md-6">
                                <select  class="form-control" name="status" >
                                <option value="0"> No </option>
                                <option value="1"> Yes </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
         </div>
        </div>
    </div>
</div>




@endsection