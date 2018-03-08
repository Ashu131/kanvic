@extends('admin.master')

@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/js/plugins/nestable/jquery.nestable.css')}}"></script>
@endsection

@section('content')

<ul>
    @foreach($data['menu_type'] as $menu_type)
    <li><a href="{{route('show.menu.single',$menu_type->menu_type_id)}}"> {{$menu_type->menu_type_name}} </a></li>
    <!--
<ul>
<li></li>
</ul>
-->
    @endforeach
</ul>
<?php
function traverseMenu($menu){
    $out = ""; 
    foreach($menu as $menu_item):
    $out .= "<li class='dd-item' data-id='{$menu_item['content']['id_menu_item']}'>";
    $out .= "<div class='dd-handle'><a href='index.php' class='effect-1'>".$menu_item['content']['menu_name']."</a></div>";
    if($menu_item['has_child']==1):
    $out .= "<ul>";
    $out .= traverseMenu($menu_item['children']);
    $out .= "</ul>";
    endif;
    $out .= "</li>";
    endforeach;
    return $out;
}
?>

<div class="">
    <div class="col-lg-4">
        <div class="dd">
            <ol class="dd-list">
                {!!traverseMenu($data['menu'])!!}
            </ol>
        </div>




        <form action="{{route('order.menu.single',$data['this_menu']->id_menu)}}" method="post">
            <input type="text" id="menu_order" name="menu_order" value="">
            <input type="hidden" name="_token" value="{{Session('_token')}}">
            <button type="submit">Submit</button>
        </form>


    </div>

    <div class="col-lg-4">
        <div class="block block-themed">
            <div class="block-header bg-info">

                <h3 class="block-title">Material (floating)</h3>
            </div>


            <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                <li class="active">
                    <a href="#btabs-alt-static-justified-home"><i class="fa fa-paperclip"></i> External Link</a>
                </li>
                <li class="">
                    <a href="#btabs-alt-static-justified-profile"><i class="fa fa-file"></i> Page</a>
                </li>
            </ul>

            <div class="block-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="btabs-alt-static-justified-home">
                        <form class="form-horizontal push-10-t push-10" action="{{route('create.menu.single',$data['this_menu']->id_menu)}}" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="menu_name" name="menu_name">
                                        <label for="contact3-firstname">Menu Name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="menu_item_class" name="menu_item_class">
                                        <label for="contact3-lastname">Id</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material floating open">
                                        <input class="form-control" type="text" id="menu_item_class" name="menu_item_class">
                                        <label for="contact3-subject">Class</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="menu_url" name="menu_url">
                                        <label for="contact3-lastname">URL</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material floating open">
                                        <select class="form-control" id="open_in" name="open_in" size="1">
                                            <option value="_blank">Open in new window</option>
                                            <option value="">Open in same window</option>
                                        </select>
                                        <label for="contact3-subject">Open In</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="css-input switch switch-sm switch-success">
                                        <input type="checkbox" value="1" id="enable" name="enable"><span></span> enabled?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input type="hidden" name="menu_type_id" value="{{$data['this_menu']->id_menu}}">
                                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="btabs-alt-static-justified-profile">
                        <form class="form-horizontal push-10-t push-10" action="{{route('create.menu.single')}}" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="menu_name" name="menu_name">
                                        <label for="contact3-firstname">Menu Name</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating open">
                                        <select class="form-control" id="menu_page_id" name="menu_page_id" size="1">
                                            <option value="1">Home</option>
                                            <option value="2">About</option>
                                        </select>
                                        <label for="contact3-subject">Select Page</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label class="css-input switch switch-sm switch-success">
                                        <input type="checkbox" value="1" id="enable" name="enable"><span></span> enabled?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input type="hidden" name="menu_type_id" value="{{$data['this_menu']->id_menu}}">
                                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<div class="">


</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/nestable/jquery.nestable.js')}}"></script>
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
