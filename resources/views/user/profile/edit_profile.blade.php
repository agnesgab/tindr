@include('layouts.head')
@include('layouts.header')
<div id="admin-login-form">
    <h2 class="header">Edit</h2>
    <div>
        <form method="POST" action="/update" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}">
                <label>Gender:</label>
                <div class="gender-input">
                    <label for="male">Male</label><br>
                    <input type="radio" id="male" name="gender" value="1" checked="checked">
                    <label for="female">Female</label><br>
                    <input type="radio" id="female" name="gender" value="2">
                </div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="{{ $user->description }}">
                <label for="location">Location:</label>
                <div class="location-input">
                    <select name="location" id="location">
                        <option value="Latvia">Latvia</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Lithuania">Lithuania</option>
                    </select>
                </div>
                <input type="file" name="image">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</div>



