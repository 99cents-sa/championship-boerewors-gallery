@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card uper">
  <div class="card-header">
    Add Image
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
      <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">

      <div class="form-group">
 @csrf
  <select class="form-control" name="event_id">
  <option disabled selected value> -- select an option -- </option>
    @foreach($items as $item)
      <option value="{{$item->id}}">{{$item->event_name}}</option>
    @endforeach
  </select>
</div>
          <div class="form-group">
              @csrf
              <label for="name">Image:</label>
              <input type="file" class="form-control" name="event_image"/>
          </div>

          <button type="submit" class="btn btn-primary">Upload Image</button>
      </form>
  </div>
</div>
                
        </div>
    </div>
</div>
@endsection


