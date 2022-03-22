@extends('layouts.app')

@section('content')
<div class="tm-home-img-container">
            <img src="{{ asset('img/tm-home-img.jpg') }} " alt="Image" class="img-fluid">
        </div>

        <section class="tm-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                        <h2 class="tm-gold-text tm-title">Introduction</h2>
                        <p class="tm-subtitle">Suspendisse ut magna vel velit cursus tempor ut nec nunc. Mauris vehicula, augue in tincidunt porta, purus ipsum blandit massa.</p>
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

                <div class="row tm-margin-t-big">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="tm-2-col-left">
                            @foreach ($data as $keyy => $value)
                        @if($keyy == 0)

                         <h3 class="tm-gold-text tm-title">{{$value->title}}</h3>
                          
                             @if(!empty($value->image) && $value->image != 'null')
            
                                @foreach(json_decode($value->image) as $key => $img)
                                @if($key == 0)
                               <img src="{{ URL::to('/') }}/uploads/{{$img }}" alt="Image" class="tm-margin-b-40 img-fluid" />
                               @endif
                                @endforeach
                                @else
                                No Image
                                @endif
                        
                            <p>
                               {{ \Str::limit($value->description, 100) }}
                            </p>
                            <a href="{{ URL::to('post') }}/{{$value->slug}}" class="tm-btn text-uppercase">Read More</a>

                            @endif
                        @endforeach
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                        <div class="tm-2-col-right">

                            <div class="tm-2-rows-md-swap">
                                                       
                                
                                <div class="row tm-2-rows-md-down-1 tm-margin-t-mid">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h3 class="tm-gold-text tm-title tm-margin-b-30">Tags</h3>

                                          @foreach ($tags as $keyy => $value)
                                           

                                             <div class="media tm-related-post">
                                         <a href="{{ URL::to('tag') }}/{{$value->id}}"><h4 class="media-heading tm-gold-text ">{{$value->name}}</h4></a>
                                        </div>

                                                
                                            @endforeach

                                       
                                       
                                        
                                    </div>
                                </div>    
                            </div>

                        </div>
                        
                    </div>
                </div> <!-- row -->

            </div>
        </section>
@endsection
