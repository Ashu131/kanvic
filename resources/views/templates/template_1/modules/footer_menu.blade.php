<div class="vc_col-sm-2 vc_col-xs-6">
    <div class="widget-area">
        <aside id="recent-posts-3" class="widget widget_recent_entries">
            <h3 class="widget-title">Quick link</h3>        
                <ul>
                  @foreach($menu_items as $item)
                   <li class="cat-item cat-item-4"><a href="{{url($item->menu_slug)}}">{{$item->menu_name}}</a></li>
                  @endforeach
                </ul>     
          </aside>                          
    </div>  
</div>

<div class="vc_col-sm-2 vc_col-xs-6">
    <div class="widget-area">
        <aside id="mks_flickr_widget-3" class="widget mks_flickr_widget">
           <h3 class="widget-title">Projects</h3>
           <ul>
                <?php
                   $projectmenu1 = DB::table('newpage')->get();
                   foreach($projectmenu1 as $projectnav)
                    {
                        if($projectnav->status!="completed")
                         {
                            echo '<li><a href="'.url('project/'.$projectnav->project_slug).'">'.$projectnav->project_name.'</a></li>';
                         }
                    }
                   
                ?>
            </ul>
            <div class="clear"></div>
        </aside>
    </div>  
</div>