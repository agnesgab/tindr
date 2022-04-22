@component('mail::message')
# You've got a new match!

Log in to see who liked you!

@component('mail::button', ['url' => 'http://localhost/'])
Log In
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
