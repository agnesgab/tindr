@include('layouts.head')
@include('layouts.header')
<div class="matches-container">
    @foreach($profiles as $profile)
    <div class="card match-card" style="width: 18rem;">
        <div style="height: 220px">
            <img src="{{ $profile->image[0]->image_path }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href="/show/{{ $profile->id }}">{{ $profile->name }},</a>{{ $profile->age }}</h5>
            <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{ $profile->location }}</p>
            <p class="card-text">{{ $profile->description }}</p>
        </div>
    </div>
    @endforeach
</div>
