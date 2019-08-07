@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card uper">
  <div class="card-header">
    Add Guest
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
              <label for="name">Guest Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              
          <label for="name">Guest Email:</label>
              <input type="email" class="form-control" name="email" required autocomplete="email"/>
          </div>

          <div class="form-group">
              
          <label for="name">Guest Company:</label>
              <input type="text" class="form-control" name="company"/>
          </div>

          <button type="submit" class="btn btn-primary">Add Guest</button>
      </form>
  </div>
</div>
                
        </div>
    </div>
</div>
@endsection


