<div class="row" id="eventlist">
@foreach($events as $event)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 single_event">
      <a href="{{route('show.gallery.slug',$event->slug)}}">
      <div class="center hs_service block-3 col-lg-12 col-md-12 col-sm-12">
        <img src="{{url('resources/assets/img/modules/gallery/'.$event->imgname)}}" alt="" title="" >
	    <p>
{!!strlen($event->event_name) > 40 ? substr($event->event_name,0,40)."...":$event->event_name !!}
      </p>
        
      </div>
      </a>
    </div>

@endforeach


</div>
  