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
          <td>Image Name</td>
          <td>Image</td>
         
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
        <tr>
            <td>{{$image->id}}</td>
            <td>{{$image->filename}}</td>
            <td>
           
            <img class="img-responsive"  style="width: 150px; height: auto;" src='http://ec2-54-161-60-4.compute-1.amazonaws.com/uploads/{{ $image->filename }}';/>
            </td>
           
            <td><a href="{{ route('images.edit',$image->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('images.destroy', $image->id)}}" method="post">
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


