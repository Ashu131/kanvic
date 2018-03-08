<div class="contantDiv">
          <div class="aboutheader">
            <div class="bannerimage">
        @foreach($datas['project'] as $project)
                
    <img class="img-responsive gallery-thumbnail"  src="{{url('resources/assets/img/modules/pagebanner/'.$project->banner)}}" 

                
                @endforeach
              
              
              </div>
            <div class="container aboutmenu">
                @include('templates.abouttemplate.aboutUsNav')
            
            </div>
          </div>
</div>
          </div>

<?php

function traverseMenu($menu){
    $out = ""; 
    foreach($menu as $menu_item):
    $out .= "<li";
    if($menu_item['content']['menu_item_class']!="")            
        $out .= "class='".$menu_item['content']['menu_item_class']."'";
    $out .=">";
    $out .= "<a href='index.php' class='effect-1'>";
    if($menu_item['content']['menu_img_url']!="")
        $out .= "<img src=\"".url('resources/assets/img/modules/menu/'.$menu_item['content']['menu_img_url'])."\"";
    else
        $out .= $menu_item['content']['menu_name'];
        $out .= "</a>";
    if($menu_item['has_child']==1):
    $out .= "<ul class='dropdown' id='secondul'>";
    $out .= traverseMenu($menu_item['children']);
    $out .= "</ul>";
    endif;
    $out .= "</li>";
    endforeach;
    return $out;
}
?>