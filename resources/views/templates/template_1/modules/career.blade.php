
<div class="wpb_column vc_column_container">
    <div class="wpb_wrapper">
        <div class="wpb_text_column wpb_content_element ">
            <div class="wpb_wrapper contact-form-panel">
                <h2 class="contact-heading hs_heading">Apply Online</h2>
                    <div role="form" class="" id="" >
                        <div class="screen-reader-response"></div>
            <form enctype="multipart/form-data" method="post" class="wpcf7-form contact-form" action="{{route('submit.form',$form->form_id)}}">
             @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('failure'))
                <div class="alert alert-danger">{{Session::get('failure')}}</div>
            @endif
                <?= traverseFormField($form_field,0,$errors); ?>
                {{csrf_field()}}
            </form>

<?php

function traverseFormField($form,$loop,$errors){
    $out = ""; 
    $error = "";
    /*$out .= "<div style='display: none;'>
                    <input type='hidden' name='_wpcf7' value='5992' />
                    <input type='hidden' name='_wpcf7_version' value='4.2.2' />
                    <input type='hidden' name='_wpcf7_locale' value='en_US' />
                    <input type='hidden' name='_wpcf7_unit_tag' value='wpcf7-f5992-p1154-o1' />
                    <input type='hidden' name='_wpnonce' value='b94c0ac21d' />
                </div>
            ";*/
    foreach($form as $form_field_single):
$out .= "<div class='form ";
if($form_field_single['content']['form_field_name']!='Submit')
$out .= $form_field_single['content']['form_field_class'];
if($form_field_single['content']['form_field_name']=='Submit')
$out .=  "clear";

$out .=  "'>";
   //if($form_field_single['content']['form_field_label']!=""){
        //$out .= "<p class='".$form_field_single['content']['form_field_name']."'>".$form_field_single['content']['form_field_label'];
        //if(in_array('required',explode('|',$form_field_single['content']['form_field_rule'])))
         //  $out .= " (required)";
       // $out .= "</p>";
    //}
  
    
    $form_field_type = explode('[', $form_field_single['content']['form_field_type']);
    $form_field_sub = explode(']',$form_field_type[1]);
    
    if($form_field_type[0]=='input'){
        $out .= '<div class="col-lg-6 col-md-6 col-sm-6 mt15">';
        if($form_field_single['content']['form_field_name']=="resume")
           $out .= 'Attach resume'; 
          $out .= '<span class="">
                    <input type="'.$form_field_sub[0].'" id="'.$form_field_single['content']['form_field_name'].'" class="'.$form_field_single['content']['form_field_class'].'" placeholder="'.$form_field_single['content']['form_field_placeholder'].'" value="'.Input::old($form_field_single['content']['form_field_name'],$form_field_single['content']['form_field_value']).'" name="'.$form_field_single['content']['form_field_name'].'">
                </span>';

    if($form_field_single['content']['form_field_rule']=="")
    $out .= '</div>';
    }
    elseif($form_field_type[0]=='textarea')
    {
        $out .= '<div class="mt15">
                    <span class="">
                    <textarea name="'.$form_field_single['content']['form_field_name'].'" class="wpcf7-form-control '.$form_field_single['content']['form_field_class'].'" type="'.$form_field_sub[0].'" placeholder="'.$form_field_single['content']['form_field_placeholder'].'" rows="5">'.Input::old($form_field_single['content']['form_field_name'],$form_field_single['content']['form_field_value']).'</textarea>
                   </span>
                </div>';
    }
    
    elseif($form_field_type[0]=='select'){
        $out .= "<select name='".$form_field_single['content']['form_field_name']."' class='".$form_field_single['content']['form_field_class']."'>";
        $form_field_options = explode('|',$form_field_single['content']['form_field_option']);
        for($form_option_count=0;$form_option_count<count($form_field_options);$form_option_count++)
            $out .= "<option value='$form_field_options[$form_option_count]'>$form_field_options[$form_option_count]</option>";

        $out .= "</select>";
    }
    elseif($form_field_type[0]=='captcha'){
        $out .= "<div class='col-lg-6 col-md-6 col-xs-12'>
            <p><img id='captcha' alt='' src='./captcha'></p>
            <p>ENTER THE CODE HERE BELOW</p>
            <input id='6_letters_code' class='career_c_input' name='captcha' type='text'>
            <p>Cant read the image? click <span id='refresh' class='text-info'>here</span> to refresh</p>";
    }
    
    if($form_field_single['content']['form_field_rule']!="")
    $error .= "<p class='text-danger'>".$errors->first($form_field_single['content']['form_field_name'])."</p>";    

    if($form_field_single['has_child']==1):
    $out .= traverseFormField($form_field_single['children'],$loop+1,$errors);
    $loop-1;
    endif;


    if($form_field_single['content']['form_field_label']!="")
       //$out .= "</div>";
    
    
    if($form_field_sub[0]!='submit')
    $out .= $error;

   if($form_field_single['content']['form_field_rule']!="")
   $out .= "</div>";
    $error ="" ;

    $out .= "</div>";
    endforeach;
    return $out;
}
?>


                </div>
            </div>
        </div>
    </div>
</div>
