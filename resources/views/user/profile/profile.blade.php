@include('layouts.head')
@include('layouts.header')
<div class="profile-container">
    <div>
        <div class="card" style="width: 18rem;">
            <div style="height: 220px">
                <img src="{{ $user->image[0]->image_path }}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}, {{ $user->age }}</h5>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{ $user->location }}</p>
                <p class="card-text">{{ $user->description }}</p>
                <div class="btn-container">
                    <form method="get" action="/edit/{{ session('loginId') }}">
                        @csrf
                        <button class="link-button" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-container">
        <div>
            <div>
                <div style="display: flex">
                    @foreach($user->albumImage as $image)
                        <div style="margin: 10px;height: 300px">
                            <img class="album-img" src="{{$image->image_path}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="admin-login-form" class="image-form">
            <h4>Upload album images</h4>
            <div>
                <form method="post" action="../album/create" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="album-image">
                    <button type="submit">Add to Album</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



