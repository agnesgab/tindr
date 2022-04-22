@include('layouts.head')
<h1>Welcome to TINDR</h1>


<div id="admin-login-form">
    <h2 class="header">Log in</h2>
    <div>
        <form method="post" action="/login">
            @csrf
            <label>E-mail:</label>
            <input type="text" name="email" placeholder="email">
            <label>Password:</label>
            <input type="password" name="password" placeholder="password">
            <button type="submit">Log In</button>
        </form>
        <a href="/age">Register</a>
    </div>
</div>
