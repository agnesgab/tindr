@include('layouts.head')
<div id="admin-login-form">
    <h2 class="header">Registration</h2>
    <div>
        <form method="POST" action="/create" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="email">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="password">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Name">
                <label>Gender:</label>
                <div class="gender-input">
                    <label for="male">Male</label><br>
                    <input type="radio" id="male" name="gender" value="1" checked="checked">
                    <label for="female">Female</label><br>
                    <input type="radio" id="female" name="gender" value="2">
                </div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="About you...">
                <label for="location">Location:</label>
                <div class="location-input">
                    <select name="location" id="location">
                        <option value="Latvia">Latvia</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Lithuania">Lithuania</option>
                    </select>
                </div>
                <input type="hidden" name="age" value="{{ $age }}">
                <input type="file" name="image">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</div>


