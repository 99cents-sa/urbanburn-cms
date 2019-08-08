@extends('layouts.app')

@section('content')

<div class="container">
<a href="{{ route('guests.create')}}" class="btn btn-primary">Add Guest</a><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card uper">
  <div class="card-header">
    Guests
  </div>
  <div class="card-body">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Guest Name</td>
          <td>Guest Email</td>
          <td>Guest Company</td>
          <td>Responded</td>
          <td>Attending</td>
        
         
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td>{{$guest->id}}</td>
            <td>{{$guest->name}}</td>
            <td>{{$guest->email}}</td>
            <td>{{$guest->company}}</td>
            <td>{{$guest->responded}}</td>
            <td>{{$guest->attending}}</td>
           
            <td><a href="{{ route('guests.edit',$guest->id)}}" class="btn btn-primary">Edit</a></td>

            <td>
                <form action="{{ route('guests.destroy', $guest->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
          
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
                
        </div>
    </div>
</div>
@endsection


