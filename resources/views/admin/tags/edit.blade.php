@extends('admin.layout')

   
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Tag</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tags') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('updateTag') }}" method="post">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control" placeholder="Name" required />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail" required>{{ $tag->description }}</textarea>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" name="id" value="{{$tag->id}}" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<style>
    
.delImg {
  position: absolute;
  margin-left: -10px;
  margin-top: -10px;
  color: red;
  font-weight: bold;
}
</style>
