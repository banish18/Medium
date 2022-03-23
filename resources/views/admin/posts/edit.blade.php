@extends('admin.layout')

   
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts') }}"> Back</a>
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
  
    <form action="{{ route('updatePost',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail" required>{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" placeholder="Enter Slug" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tags:</strong>
               
                <select class="form-control" name="tags" required>
                    <option value="">Select Tag</option>

                    @foreach($tags as $tag)
                   
                        @if($tag->id == $post->tags )
                        <?php
                            $seleced = "selected=selected";
                            ?>
                       
                        @else
                        <?php
                        $seleced = '';
                        ?>
                         @endif
                         <option value="{{$tag->id}}" @if ($tag->id == $post->tags)
        selected="selected"
    @endif>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Images:</strong>
                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
            </div>
            @if(!empty($post->image) && $post->image != 'null')
            <div class="pimages">
                @foreach(json_decode($post->image) as $key=>$img)
                 <img src="{{ URL::to('/') }}/uploads/{{$img }}" class="{{$key}}_img" width="150" height="150" />
                 <input type="hidden" class="pre-images {{$key}}_img" name="pre_images[]" value="{{$img}}" />
                  <a href="javascript:void(0)" class="delImg" onclick="remove_img(this,'{{$key}}_img','{{$post->id}}')" title="Remove Image">X</a> 
                @endforeach
            </div>
            @endif
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" name="id" value="{{$post->id}}" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function remove_img(elm,img,postId){
        jQuery(elm).remove();
        jQuery('.'+img).remove();
        var imgs = [];
        $('.pre-images').each(function(){
          imgs.push(this.value); 
        });
        console.log(imgs);
        jQuery.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        jQuery.ajax({

           type:'POST',

           url:"{{ route('deletImages') }}",

           data:{ "_token": "{{ csrf_token() }}",images:imgs,id:postId},

           success:function(data){
            if(data.status == 1){

              alert('Image has been successfully deleted.');
            }

           }

        });
    }
</script>
<style>
    
.delImg {
  position: absolute;
  margin-left: -10px;
  margin-top: -10px;
  color: red;
  font-weight: bold;
}
</style>
