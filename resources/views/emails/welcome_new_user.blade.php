@component('mail::message')
# Hello {{ $user->name }}

Thank you for your interest in Xcelerate International and congratulations on taking the first step toward buying back
your life. Over the next few days you will learn how people just like you are already creating time and financial
freedom with this incredible business by simply sharing our products and opportunity with others. I invite you to learn
more about Xcelerate by attending one of our LIVE Zoom presentations that explains in more depth exactly how our
products and business are changing lives.

Every Tuesday and Thursday <br />
9:00PM EST / 6:00PM PST <br />
<a href='http://xizoom.com'>http://xizoom.com</a> <br />

One of our members will be reaching out to you via phone or email to answer any additional questions and to share their
experience with Xcelerate International.

Your Xcelerate International contact will be:

{{ $sponsor->firstname }} {{ $sponsor->lastname }} <br />
{{-- {{ $sponsor->phone_number }} <br /> --}}
{{ $sponsor->email }} <br />

Thanks,<br>

{{ config('app.name') }}
@endcomponent
