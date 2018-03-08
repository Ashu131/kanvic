<div class="enquiry @if(Session::has('success')||Session::has('failure')) open @endif ">  
    <div class="on_enquiry">
        <div class="on_enquiry_txt"> Enquiry</div>
    </div>
    <div class="on_enquiry_form">
        <form enctype="multipart/form-data" method="post" action="{{route('submit.form',$form->form_id)}}">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('failure'))
            <div class="alert alert-danger">{{Session::get('failure')}}</div>
            @endif
            <?= traverseFormField($form_field,0,$errors); ?>
            <input type="hidden" name="_token" value="{{Session::getToken()}}">
        </form>
    </div>              
</div>


<?php

function traverseFormField($form,$loop,$errors){
    $out = ""; 
    $error = "";
    foreach($form as $form_field_single):
    if($form_field_single['content']['form_field_label']!=""){
        $out .= "<div class=' clearfix'>";
        $out .= "<span class='col-md-1 hide form_lable'>".$form_field_single['content']['form_field_label'];
        if(in_array('required',explode('|',$form_field_single['content']['form_field_rule'])))
            $out .= "<span class='req'>*</span>";
        $out .= "</span>";
    }
    if($loop==0)
        $out .= "<div class=".$form_field_single['content']['form_field_class'].">";
    else
        $out .= "<div class='".$form_field_single['content']['form_field_class']." form_input'>";

    $form_field_type = explode('[', $form_field_single['content']['form_field_type']);
    $form_field_sub = explode(']',$form_field_type[1]);



    if($form_field_type[0]=='input'){
        $out .= "<input type='$form_field_sub[0]' placeholder='".$form_field_single['content']['form_field_placeholder']."' value='".Input::old($form_field_single['content']['form_field_name'],$form_field_single['content']['form_field_value'])."' name='".$form_field_single['content']['form_field_name']."'>";
    }
    elseif($form_field_type[0]=='textarea')
        $out .= "<textarea name='".$form_field_single['content']['form_field_name']."' class=".$form_field_single['content']['form_field_class']." type='$form_field_sub[0]' placeholder='".$form_field_single['content']['form_field_placeholder']."'>".Input::old($form_field_single['content']['form_field_name'],$form_field_single['content']['form_field_value'])."</textarea>";
    elseif($form_field_type[0]=='select'){
        $out .= "<select name='".$form_field_single['content']['form_field_name']."'>";
        $form_field_options = explode('|',$form_field_single['content']['form_field_option']);
        for($form_option_count=0;$form_option_count<count($form_field_options);$form_option_count++)
            $out .= "<option value='$form_field_options[$form_option_count]'>$form_field_options[$form_option_count]</option>";

        $out .= "</select>";
    }
    elseif($form_field_type[0]=='captcha'){
        $out .= "
    <p><img id='captcha' alt='' src='http://mpm1-pc/newcms/captcha'></p>
    <p>ENTER THE CODE HERE BELOW</p>
<input id='6_letters_code' class='career_c_input' name='captcha' type='text'>
<p>Cant read the image? click <span id='refresh' class='text-info'>here</span> to refresh</p>";
    }


    $error .= "<p class='text-danger'>".$errors->first($form_field_single['content']['form_field_name'])."</p>";    

    if($form_field_single['has_child']==1):
    $out .= traverseFormField($form_field_single['children'],$loop+1,$errors);
    $loop-1;
    endif;


    if($form_field_single['content']['form_field_label']!="")
        $out .= "</div>";


    if($form_field_sub[0]!='submit')
        $out .= $error;

    $error ="" ;

    $out .= "</div>";
    endforeach;
    return $out;
}
?>

