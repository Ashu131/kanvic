@section('css')
<link rel="stylesheet" href="{{url('resources/assets/js/plugins/nestable/jquery.nestable.css')}}">
<link rel="stylesheet" href="{{url('resources/assets/css/pagination.css')}}">
@endsection

 
@foreach($gallery_items as $gallery_item)
      <!--  <div class="col-md-4 ">
            <div class="press_single">
                <a href="{{url('resources/assets/img/modules/gallery/'.$gallery_item->filename)}}" rel="prettyPhoto[press]"> 
                    <img class="img img-responsive" src="{{url('resources/assets/img/modules/gallery/'.$gallery_item->filename)}}" alt="{{$gallery_item->information}}"> 
                </a>
            </div>
            <p class="text-center gallery-info">{{$gallery_item->information}}</p>
        </div>-->
	<div class="vc_col-sm-3 wpb_column vc_column_container clearfix wpb_animate_when_almost_visible wpb_bottom-to-top">
		<div class="wpb_wrapper" >
			
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<div style="width: 640px; " class="wp-video">
<video class="wp-video-shortcode" id="video-796-1" width="640" height="360" preload="metadata" controls="controls">
    <source type="video/mp4" src="{{$gallery_item->link}}" /><a href="{{$gallery_item->link}}">
    </a></video>
            </div>

		</div> 
	</div> 
	</div> 
	</div>


@endforeach
      
   

<hr>
<div align="center">
   {!! $gallery_items->render() !!}
</div>
<style>
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
   
}
.pagination>li {
    display: inline;
}
.pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
     z-index: 2;
    color: #a87f2e;
    cursor: default;
    background-color: white;
    font-weight: 700;
}
    .pagination>li {
    display: inline;
}
    .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #ddd;
    text-decoration: none;
    background-color: #fff;
   
}
    .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
    .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #666666;
    text-decoration: none;
    background-color: #fff;
    border: 0px solid #ddd;
}
    .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    color: #d3d3d3;
    background-color: #eee;
    border-color: #ddd;
}
    .press_single img {
    max-height: 300px;
    max-width: 100%;
    margin: auto;
    min-height: 160px;
      
}
    .press_single {
    max-height: 400px;
    text-align: center;
    min-height: 300px;
    -webkit-box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49);
-moz-box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49);
box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49); 
        -moz-border-radius: 15px;
border-radius: 15px;
        margin-top:25px;
        
          
}
    .pagination>.disabled>span {
    color: white;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd;
}
 .pagination>.disabled>span:hover {
    color: white;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd;
}
  .pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    color:white;
  }
    .pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
        color:white;
}

  
</style>