@section('css')
<link rel="stylesheet" href="{{url('resources/assets/js/plugins/nestable/jquery.nestable.css')}}">
<link rel="stylesheet" href="{{url('resources/assets/css/pagination.css')}}">
@endsection

 
@foreach($gallery_items as $gallery_item)
        <img src="{{url('resources/assets/img/modules/gallery',$gallery_item->filename)}}" class="vc_single_image-img attachment-full" alt="modern-mobile-cut">
                    
@endforeach
<style>
#pagination{clear:both;}
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
    color: #0a5582;
    cursor: default;
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
    color: #4d4d4d;
    text-decoration: none;
   
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
    border: 0px solid #ddd;
}
    .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    color: #0a5582;
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
    border-color: #ddd;
}
  .pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    color:#4d4d4d;
  }
    .pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
        color:#4d4d4d;
}

  
</style>