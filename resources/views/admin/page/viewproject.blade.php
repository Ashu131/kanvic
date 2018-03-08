@extends('admin.master')

@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/js/plugins/nestable/jquery.nestable.css')}}">
<link rel="stylesheet" href="{{url('resources/assets/admin/css/project.css')}}">
@endsection

@section('content')



<form class="form-horizontal page-form push-10-t push-10" action="{{route('show.project.new')}}" method="get" enctype="multipart/form-data"> 
    <select name="project">
        <option>Select project</option>
        @foreach($data['project'] as $project)
        <option value="{{$project->project_id}}">{{$project->project_name}}</option>



        @endforeach
    </select>

    <button type="submit">Go</button>

</form>

@foreach($datas['project_id']as $project_id)
<h1><label class="" style="font-size:24px;font-family:Times New Roman;">  {{$project_id->project_name}}     </label></h1>
<div>




    <table width="450px">
        <tr>
            <td>

                <label style="font-size:16px;">Project name:</label> 
            </td>
            <td>{{$project_id->project_name}}</td>
        </tr>
        </div>
    <div>
        <tr>
            <td>
                <label style="font-size:16px;">Project logo:</label>
            </td>
            @if ($project_id->project_logo =='') 
            <img class="new img img-responsive" src="" style="display:none">
            @else

            <td>     <img class="single-image img img-responsive" src="{{url('resources/assets/admin/img/modules/projectlogo/'.$project_id->project_logo)}}" style="width:300px;" >
                <br>
    </div>
        </td>
    </tr>


@endif

<tr><td>    <label style="font-size:16px;">Graphic location plan:</label> </td>
    <div> @if ($project_id->graphic_location_file =='') 
        @else
        <td>     <img class="single-image new img img-responsive" src="{{url('resources/assets/admin/img/modules/graphiclocationmap/'.$project_id->graphic_location_file)}}" style="width:300px;"></td>
        </tr>
    @endif
   


    <div>
        <tr>
            <td>
                <label style="font-size:16px;">Address:</label>

            </td>
            <td>
                {{$project_id->address}}
            </td>
        </tr>
    </div>

    <div><tr><td><label style="font-size:16px;">Web address:</label></td><td>{{$project_id->web_address}}</td>
        </tr>
    </div>
    <div>
        <tr><td>    <label style="font-size:16px;">Payment plan:</label> </td>
     <td>{{$project_id->payment_plan}}</td>
        </tr>
    </div>

    <div>
        <tr><td>     <label style="font-size:16px;">Location:</label></td><td> {{$project_id->location}}</td></tr>
    </div>

    <div>
        <tr><td>     <label style="font-size:16px;">About:</label> </td><td> {{$project_id->about}}</td></tr>
</div>
<div>
    <tr><td>  <label style="font-size:16px;">Specifications:</label> </td><td> {{$project_id->specification}}</td></tr>
</div>
<div>
    <tr><td>  <label style="font-size:16px;">Features:</label></td><td>{{$project_id->features}}</td></tr>
</div>



<div>
   
    <tr><td>  <label style="font-size:16px;">Floor plans</label></td>
        @foreach($datafloor['p_id']as $p_id) 
        @if ($p_id->floor_plan =='') 
        <img class="new img img-responsive" src="" style="display:none">
        @else

        <td><img class="multiple-image img img-responsive" src="{{url('resources/assets/admin/img/modules/floorplans/'.$p_id->floor_plan)}}" style="width:100px;"  ></td>

        @endif
        @endforeach
       
    </tr>
   
  
</div>
  
<tr><td> <label style="font-size:16px;">Construction updates:</label></td>
    @foreach($dataconstruction['p_id'] as $p_id)
    @if($p_id->construction_updates=='')
    <img class="new img img-responsive" src="" style="display:none">
    @else

    <td> <img class="multiple-image img img-responsive" src="{{url('resources/assets/admin/img/modules/constructionupdates/'.$p_id->construction_updates)}}" style="width:100px;">
    </td>


    @endif
    @endforeach
</tr>
</div>



<div>
    <tr><td>    <label style="font-size:16px;">E brochure:</label></td>

        @foreach($dataebrochure['p_id']as $p_id) 

        @if($p_id->ebrochure=='')
        <img class="new img img-responsive" src="" style="display:none">
        @else
        <td>   <img class="multiple-image img img-responsive" src="{{url('resources/assets/admin/img/modules/ebrochure/'.$p_id->ebrochure)}}" style="width:100px;">

        </td>


        @endif
        @endforeach
    </tr>
    <tr><td><label style="font-size:16px;">Master plan layout:</label></td>


       @foreach($datas['project_id']as $project_id) 
           
            @if ($project_id->master_layout_plan =='') 

            @else


            <div class="col-sm-6 col-md-4 col-lg-3 ">

                <td>     <img class="single-image img img-responsive" src="{{url('resources/assets/admin/img/modules/masterlayoutplan/'.$project_id->master_layout_plan)}}"></td>
                </tr>
              
            </div>
            </p>

       
        @endif
        @endforeach


@if($project_id->walkthrough=='Embedded code')
<div id="textbox">
    <label style="font-size:16px;">Embedded code:    {{$project_id->embedded}}
        </div>
    @elseif($project_id->walkthrough=='Upload video')
    <div id="video">
        <label style="font-size:16px;">Video: <img class="single-image img img-responsive" src="{{url('resources/assets/admin/img/modules/video/'.$project_id->video)}}">

            </div>
        @else


        @endif

        <div>
            <tr><td>
                <label style="font-size:16px;">Latitude:</label></td>
                <td>{{$project_id->latitude}}
                </td>
            </tr>
        </div>
        <div>
            <label style="font-size:16px;">Longitude:</label>{{$project_id->longitude}}
        </div>
       
            <tr>
                <td>
                    <label style="font-size:16px;">Gallery:</label>
                </td>

                @foreach($datagallery['p_id']as $p_id)
                @if ($p_id->gallery =='') 

                @else
                <td><img class="multiple-image img img-responsive" src="{{url('resources/assets/admin/img/modules/projectgallery/'.$p_id->gallery)}}" style="width:100px;">
                </td>
                @endif
                @endforeach 
            </tr>
        </table>
        <div>
            <label style="font-size:16px;">Publish:</label>{{$project_id->publish}}
        </div>
 @endforeach



        @endsection
