@extends('layouts.app')

@section('content')

        <section class="tm-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                        <h2 class="tm-gold-text tm-title">{{$data->title}}</h2>
                          @foreach(json_decode($data->image) as $key => $img)
                                
                               <img src="{{ URL::to('/') }}/uploads/{{$img }}" alt="Image" class="" width="500" height="250" />
                              
                                @endforeach
                               
                        <p class="tm-subtitle">{{$data->description}}</p>
                    </div>
                </div>
            </div>
        </section>
@endsection
