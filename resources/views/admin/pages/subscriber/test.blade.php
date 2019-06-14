@component('mail::message')
# RosyZ Mail Services

{{$subject}}

@component('mail::button', ['url' => 'http://upureka.com/complete-projects/RosyZ/'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
