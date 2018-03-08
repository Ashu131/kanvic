@extends('admin.master')

@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/css/jquery.nestable.css')}}"></script>
@endsection

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
        @if(Session::has('failure'))
        <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif

<?php
function traverseMenu($menu){
    $out = ""; 
    foreach($menu as $menu_item):
    $out .= "<li class='dd-item' data-id='{$menu_item['content']['id_menu_item']}'>";
    $out .= "<div class='pull-right p8'>
                <a data-menu-id='".route('get.menu.edit',$menu_item['content']['id_menu_item'])."'><i class='fa fa-lg fa-edit'></i></a>
            </div>
            <div class='dd-handle'><a class='effect-1'>".$menu_item['content']['menu_name']."</a> </div>
            ";
    if($menu_item['has_child']==1):
    $out .= "<ol>";
    $out .= traverseMenu($menu_item['children']);
    $out .= "</ol>";
    endif;
    $out .= "</li>";
    endforeach;
    return $out;
}
?>
<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Menu Items</h3>
    </div>
    <div class="block-content">

        <div class="row">
            <div class="col-lg-5 ">
                <div class="dd">
                    <ol class="dd-list">
                        {!!traverseMenu($data['menu'])!!}
                    </ol>
                </div>
                <form class="form-horizontal push-10-t push-10" action="{{route('order.menu.single',$data['this_menu']->id_menu)}}" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="menu_order" name="menu_order" value="">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 col-lg-offset-1 create-menu">
                @include('admin.menu.create_menu_item')
            </div>    

        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/jquery.nestable.js')}}"></script>
<script>
    $(document).ready(function(){
        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');

            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        $('.dd').nestable().on('change', updateOutput);        
        updateOutput($('.dd').data('output', $('#menu_order')));        

        $('#nestable').nestable({
            group: 1
        })
            .on('change', updateOutput);
        updateOutput($('#nestable').data('output', $('#menu_order')));


    });
</script>

<script>
$(document).on("click",".tab-change",function(e)
{   
    e.preventDefault();
    $('.tab-pane').removeClass('active');
    $('.nav-tabs > li').removeClass('active');
    $(this).parent().addClass('active');
    var href = $(this).attr('href');
    $(href).addClass('active');
});


$(document).on("click",".dd-item a",function(e){
    e.preventDefault();
    
    var url = $(this).attr('data-menu-id');
    $('.dd-item').removeClass('active-li');
    $(this).parent().parent().addClass('active-li');
    console.log(url);
        $.ajax({
          method: "GET",
          url: url,
          success:function(data){
            $('.create-menu').html(data['view']);
          }
        });

}) 
</script>

@if(Session::has('success'))
<script>
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-check',
            title: 'Success: ',
            message: '{{Session::get('success')}}', 
        },{
            allow_dismiss: true,
            type: 'success',
            placement: {
                from: "top",
                align: "center"
            },
        });
    });
</script>
@endif
@endsection
