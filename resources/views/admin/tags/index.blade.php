@extends('admin.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tags</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('createTag') }}"> Create New Tag</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>
                <form action="{{ route('deleteTag') }}" method="POST">   
                     
                    <a class="btn btn-primary" href="{{ route('editTag',$value->id) }}">Edit</a>   
                    @csrf
                   <input type="hidden" name="id" value="{{$value->id}}" />
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection

<style>
    
    nav svg{
        width: 50px;
        height: 50px;
    }
    .p_images_td img{
        margin: 10px;
        border: 1px solid #000;
    }
</style>