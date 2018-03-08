
        <?= traverseMenu($menu_items,0); ?>



<?php

function traverseMenu($menu,$loop){
    $out = ""; 
    foreach($menu as $menu_item):
    $out .= "<li class='menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children";
if($menu_item['active']==1)
        $out .= " current-menu-item";

    if($menu_item['content']['menu_item_class']!="")            
        $out .= "".$menu_item['content']['menu_item_class']."";
    $out .="' data-id='".$menu_item['content']['menu_page_id']."'>";
    $out .= "<a";
    if($menu_item['content']['menu_page_id']!=0)
    $out .= " href='".route('show.page.slug',$menu_item['content']['page_slug'])."'";
    
    // if($menu_item['content']['menu_page_id']==68)
    // {
    //     $project = DB::table('newpage')->get();
    //     foreach($project as $projectlist)
    //     {
    //         $out .= $projectlist->project_name;
    //     }
    // }
    
    $out .= " class='mainNava'>";
     if($menu_item['content']['menu_item_id']!="")            
        $out .= " id='".$menu_item['content']['menu_item_id']."'";
    if($menu_item['content']['menu_img_url']!=""){
        $out .= "<img src=\"".url('resources/assets/img/modules/menu/'.$menu_item['content']['menu_img_url'])."\"";
    }
    else{
        //if($loop>0)
            //$out .= '<span class="effect_drop_menu">';
        $out .= $menu_item['content']['menu_name'];
    }
    $out .= "</a>";
    if($menu_item['has_child']==1):
    $out .= "<ul class='".$menu_item['content']['menu_item_class']."_menu dropdown'>";
    $out .= traverseMenu($menu_item['children'],$loop+1);
    $loop-1;
    $out .= "</ul>";
    
    elseif($menu_item['content']['menu_page_id']==68):
    $out .= "<ul class='".$menu_item['content']['menu_item_class']."_menu dropdown'>";
        $project = DB::table('newpage')->groupBy('status')->orderBy('status', 'DESC')->get();
        foreach($project as $projectlist)
        {
            
            $out .= '<li projecttype="'.str_slug($projectlist->status).'"><a href="'.route('show.page.slug','projects/'.str_slug($projectlist->status,'-')).'">'.$projectlist->status.'</a></li>';
        }
    $out .= "</ul>";
    endif;
    $out .= "</li>";
    endforeach;
    return $out;
}
?>
