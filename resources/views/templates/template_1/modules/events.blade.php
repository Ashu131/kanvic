<div class="row" id="eventlist">
@foreach($events as $event)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 single_event">
      <div class="center hs_service block-3 col-lg-12 col-md-12 col-sm-12">
        <img src="{{url('resources/assets/img/modules/events/'.$event->imgname)}}" alt="" title="" >
	    <p>
{!!strlen($event->event_name) > 40 ? substr($event->event_name,0,40)."...":$event->event_name !!}
      </p>
        <a class="eventview_btn" href="{{route('show.event.slug',$event->slug)}}">view more </a>
      </div>
    </div>

@endforeach

</div>
              
     