@component('mail::message')
# Hello {{ $user->firstname }} {{ $user->lastname }}

Congratulations. Someone filled out the form on your GRABTHETAB marketing system.

{{ $contact->name }} <br />
{{ $contact->phone }} <br />
{{ $contact->email }} <br />

You can also log into <a href='http://www.grabthetab.com'>http://www.grabthetab.com</a> and see your new prospect's
information in your contact manager.

Please reach out to your new prospect ASAP and introduce yourself and invite them to a LIVE Xcelerate Zoom presentation.
The quicker you plug your new member into the presentations and trainings the more likely your prospect will see the
success he / she is looking for.

Every Tuesday and Thursday <br />
9:00PM EST / 6:00PM PST <br />
<a href='http://xizoom.com'>http://xizoom.com</a><br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent
