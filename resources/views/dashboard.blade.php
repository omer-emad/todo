@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
 

        <div class="col-md-8 col-md-offset-2">
        @include('inc.message')
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard 
                <span class="pull-right"><a href="/todo/create" class="btn btn-success btn-xs">Add Todo</a></span>
                </div>
                
                <div class="panel-body">
                <h3>Todo List</h3>
                <table class="table">
                <tr><th>Title</th><th>Due</th><th>Status</th><th>Action</th><th></th></tr>
                @if(count($todos) > 0 )
                @foreach($todos as $tod)
                <tr>
                
                <td>{{$tod->title}}</td>
                <td>{{$tod->due}}</td>
                <td>@if($tod->status == 1) Yes 
                @else 
                <a href="/todo/{{$tod->id}}/change" class="btn btn-success pull-center"> Complete </a>
                
                @endif
                
                </td>
                <td>
                <a href="/todo/{{$tod->id}}/edit" class="btn btn-warning pull-center"> Edit </a>
                </td><td>
                <form action='/todo/{{$tod->id}}' method="POST" >
                {{ csrf_field() }}    
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" name="submit" value="Delete" class="btn btn-danger pull-left">
                </from>
                </td>
                </tr>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
