@include('layouts.head')
@include('layouts.header')
<div id="admin-login-form">
    <h2 class="header">Preferences</h2>
    <form method="post" action="/preferences">
        @csrf
        <label>Preferred gender:</label>
        <div style="display: flex">
            <label>Male</label>
            <input id="male-checkbox" type="checkbox" name="gender" value="1" checked>
            <label>Female</label>
            <input id="female-checkbox" type="checkbox" name="gender" value="2" checked>
        </div>
        <label for="location">Location:</label>
        <select name="location" id="location">
            <option value="Latvia">Latvia</option>
            <option value="Estonia">Estonia</option>
            <option value="Lithuania">Lithuania</option>
        </select>
        <div>
            <label for="age">Age from:</label>
            <select name="min">
                @foreach(range(18, 30) as $age)
                    <option value="{{ $age }}">{{ $age }}</option>
                @endforeach
            </select>
            <label for="age">Age to:</label>
            <select name="max">
                @foreach(range(18, 30) as $age)
                    <option value="{{ $age }}">{{ $age }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Set</button>
    </form>
</div>
