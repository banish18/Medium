@extends('layouts.app')

@section('content')
        <section class="tm-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                        <h2 class="tm-gold-text tm-title">{{$tag->name}}</h2>
                        <p class="tm-subtitle">{{$tag->description}}</p>
                    </div>
                </div>
                <div class="row">
                   
                        @foreach ($data as $key => $value)
                         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 mt-5">
                         <div class="tm-content-box">
                             @if(!empty($value->image) && $value->image != 'null')
            
                                @foreach(json_decode($value->image) as $key => $img)
                                @if($key == 0)
                               <img src="{{ URL::to('/') }}/uploads/{{$img }}" alt="Image" class="tm-margin-b-20 img-fluid" />
                               @endif
                                @endforeach
                                @else
                                No Image
                                @endif
                            <h4 class="tm-margin-b-20 tm-gold-text">{{ \Str::limit($value->title, 20) }}</h4>
                            <p class="tm-margin-b-20">{{ \Str::limit($value->description, 100) }}</p>
                            <a href="{{ URL::to('post') }}/{{$value->slug}}" class="tm-btn text-uppercase">Detail</a>    
                        </div> 
                        </div>
                        @endforeach
                        

                    
                </div> <!-- row -->

                

            </div>
        </section>
@endsection
