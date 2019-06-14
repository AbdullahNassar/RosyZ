@component('mail::message')
# RosyZ Mail Services

We have received a request to get your password

Your password : {{$password}}

@component('mail::button', ['url' => 'http://upureka.com/complete-projects/RosyZ/'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
