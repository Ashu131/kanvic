@component('mail::message')
**First Name:**{{$data->fname}}<br>
**Last Name:**{{$data->lname}}<br>
**Gender:**{{$data->gender}}<br>
**Nationality:**{{$data->nationality}}<br>
**Email:**{{$data->email}}<br>
**Phone:**{{$data->phone_code}} {{$data->phone}}<br>
**Role:**{{$data->career_role}}<br>
**Interest:**{{$data->interest}}<br>
**Location:**{{$data->location}}<br>
**Start Date:**{{$data->start_date}}<br>
**Occupation:**{{$data->occupation}}<br>
**Experience:**{{$data->experience}}<br>
**Recent education:**{{$data->recent_education}}<br>
**High education:**{{$data->high_education}}<br>
**Question First:**{{$data->question1}}<br>
**Question Second:**{{$data->question2}}<br>
@if ($data->cv)
@component('mail::button', ['url' =>asset('/public/storage/ashutosh/career/'.$data->cv), 'color'=>'green' ])
Open CV
@endcomponent
@endif
@if ($data->portfolio)
@component('mail::button', ['url' =>asset('/public/storage/ashutosh/career/'.$data->portfolio), 'color'=>'red' ])
Open Portfolio
@endcomponent
@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent
