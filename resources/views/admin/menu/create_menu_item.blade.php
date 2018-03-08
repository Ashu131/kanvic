<div class="block block-themed" style="border: 1px solid rgba(128, 128, 128, 0.38);">
    <div class="block-header bg-info">
        <h3 class="block-title">
         @if(isset($data['menu_item'])) 
         {{$data['menu_item']->menu_name}}
         @else
         Add Menu   
         @endif 
        </h3>
    </div>
    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
        <li @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id=="") class="active" @endif @else  class="active" @endif >
            <a href="#btabs-alt-static-justified-home" class="tab-change"><i class="fa fa-paperclip"></i> External Link</a>
        </li>
        <li @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id!="") class="active" @endif @endif >
            <a href="#btabs-alt-static-justified-profile" class="tab-change"><i class="fa fa-file"></i> Page</a>
        </li>
    </ul>
    <div class="block-content">
        <div class="tab-content">
            <div class="tab-pane @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id=="") active @endif @else  active @endif" id="btabs-alt-static-justified-home">
                <form class="form-horizontal push-10-t push-10" @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id=="") action="{{route('create.menu.single',$data['this_menu']->id_menu)}}" @else action="{{route('menu.edit',$data['menu_item']->id_menu_item)}}" @endif @else action="{{route('create.menu.single',$data['this_menu']->id_menu)}}" @endif   method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="menu_name" name="menu_name" value="@if(isset($data['menu_item'])){{$data['menu_item']->menu_name}}@endif">
                                <label for="menu_name">Menu Name</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input class="form-control" type="text" id="menu_class" name="menu_class" value="@if(isset($data['menu_item'])){{$data['menu_item']->menu_item_class}}@endif">
                                <label for="menu_class">Id</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-material open">
                                <input class="form-control" type="text" id="menu_id" name="menu_id" value="@if(isset($data['menu_item'])){{$data['menu_item']->menu_item_id}}@endif">
                                <label for="menu_id">Class</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input class="form-control" type="text" id="menu_url" name="menu_url" value="@if(isset($data['menu_item'])){{$data['menu_item']->menu_url}}@endif">
                                <label for="menu_url">URL</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-material open">
                                <select class="form-control" id="open_in" name="open_in" size="1">
                                    <option value="_blank">Open in new window</option>
                                    <option value="">Open in same window</option>
                                </select>
                                <label for="open_in">Open In</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="css-input switch switch-sm switch-success">
                                <input type="checkbox" value="1" id="enable" name="enable" checked ><span></span> enabled?
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="menu_type_id" value="{{$data['this_menu']->id_menu}}">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> 
                            @if(isset($data['menu_item'])) 
                                    Update
                            @else
                                    Save
                            @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id!="") active @endif @endif" id="btabs-alt-static-justified-profile">
                <form class="form-horizontal push-10-t push-10" @if(isset($data['menu_item'])) @if($data['menu_item']->menu_page_id=="") action="{{route('create.menu.single',$data['this_menu']->id_menu)}}" @else action="{{route('menu.edit',$data['menu_item']->id_menu_item)}}" @endif @else  action="{{route('create.menu.single',$data['this_menu']->id_menu)}}" @endif  method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="menu_name" name="menu_name" value="@if(isset($data['menu_item'])){{$data['menu_item']->menu_name}}@endif" autofocus>
                                <label for="menu_name">Menu Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material open">
                                <select class="form-control" id="menu_page_id" name="menu_page_id" size="1">
                                    <option value="">Select a Page</option>
                                    @foreach($data['page'] as $page)
                                    <option value="{{$page->id_page}}">{{$page->page_name}}</option>
                                    @endforeach
                                </select>
                                <label for="menu_page_id">Select Page</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="css-input switch switch-sm switch-success">
                                <input type="checkbox" value="1" id="enable" name="enable" @if($data['this_menu']->enable=="1") checked @endif ><span></span> enabled?
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="menu_type_id" value="{{$data['this_menu']->id_menu}}">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> 
                                @if(isset($data['menu_item'])) 
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>