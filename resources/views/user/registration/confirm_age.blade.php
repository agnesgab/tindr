@include('layouts.head')
<div id="admin-login-form">
    <h2>Confrim your age</h2>
    <div>
        <form method="POST" action="/validation">
            @csrf
            <label for="birthday">Your birthday:</label>
            <input type="date" id="birthday" name="birthday" value="2000-01-01"/>
            <button type="submit">Confirm</button>
        </form>
    </div>
</div>
