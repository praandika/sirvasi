@extends('layouts.landing-app')
@section('landing-content')

@include('component.header')
<section class="gallery_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Naradas Sambali Gallery</h2>
        </div>
       
        <div class="row imageGallery1" id="gallery">
        @forelse($data as $o)
            <div class="col-md-4 gallery_item">
                <div class="gallery_img">
                    <img src="{{ asset('photos/post/'.$o->post_img) }}" alt="">
                    <div class="hover">
                        <a class="light" href="{{ asset('photos/post/'.$o->post_img) }}"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
            </div>
            @empty
            <h2 class="title_color">No photos available</h2>
            @endforelse
        </div>
    </div>
</section>
@include('component.footer')
@endsection
