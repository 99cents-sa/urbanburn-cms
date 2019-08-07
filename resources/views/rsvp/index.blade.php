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
          <td>Guest Name</td>
          <td>Guest Email</td>
          <td>Guest Company</td>
        
         
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
<div>
            <!-- Content goes here -->  
        </div>
