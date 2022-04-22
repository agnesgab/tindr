@include('layouts.head')
@include('layouts.header')
<div class="container">
        <div class="card mx-auto" style="width: 18rem;">
            <div style="height: 220px">
                <img src="{{ $profile->image[0]->image_path }}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="/show/{{ $profile->id }}">{{ $profile->name }}</a><small>({{ $profile->age }})</small></h4>
                <p>{{ $profile->gender->gender }}</p>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{ $profile->location }}</p>
                <p class="card-text">{{ $profile->description }}</p>
                    <div class="btn-container">
                        <form method="post" action="/like/{{ $profile->id }}">
                            @csrf
                            <button class="btn my-button" type="submit"><i class="fa-solid fa-heart"></i></button>
                        </form>
                        <form method="post" action="/dislike/{{ $profile->id }}">
                            @csrf
                            <button class="btn my-button button-x"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                    </div>
            </div>
        </div>
</div>
