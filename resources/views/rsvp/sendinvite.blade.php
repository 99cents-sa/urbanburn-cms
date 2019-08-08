@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        
         
          
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
        <tr>
            <td>{{$guest->id}}</td>
            <td>{{$guest->name}}</td>
            <td>{{$guest->email}}</td>
            <td>{{$guest->company}}</td>
           
           
          
        </tr>
        @endforeach
    </tbody>
  </table>

  <a href="{{ route('sendinginvite')}}" class="btn btn-primary">Send Invites</a>
  </div>
</div>
                
        </div>
    </div>
</div>
@endsection


