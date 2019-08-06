@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Content goes here -->
            <div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Event Name</td>
          <td>Event Description</td>
        
         
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->event_name}}</td>
            <td>{{$event->event_description}}</td>
           
            <td><a href="{{ route('events.edit',$event->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('events.destroy', $event->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
            <!-- Content goes here -->  
        </div>
    </div>
</div>
@endsection


