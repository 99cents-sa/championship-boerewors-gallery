@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card uper">
  <div class="card-header">
    Add Event
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('events.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Event Name:</label>
              <input type="text" class="form-control" name="event_name"/>
          </div>

          <div class="form-group">
              
              <label for="name">Event Description:</label>
              <textarea class="form-control" rows="5" id="event_description" name="event_description"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Create Event</button>
      </form>
  </div>
</div>
                
        </div>
    </div>
</div>
@endsection


