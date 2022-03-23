@extends('admin.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('createPost') }}"> Create New Post</a>
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
            <th>Title</th>
            <th>Description</th>
            <th>Tag ID</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>{{ \Str::limit($value->tags, 100) }}</td>
            <td class="p_images_td">
               
            @if(!empty($value->image) && $value->image != 'null')
            
            @foreach(json_decode($value->image) as $img)
            <img src="{{ URL::to('/') }}/uploads/{{$img }}" width="50" height="50" />
            @endforeach
            @else
            No Image
            @endif
            </td>
            <td>
                <form action="{{ route('deletePost') }}" method="POST">   
                   
                    <a class="btn btn-primary" href="{{ route('editPost',$value->id) }}">Edit</a>   
                    @csrf
                      
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <input type="hidden" name="id" value="{{$value->id}}" />
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
