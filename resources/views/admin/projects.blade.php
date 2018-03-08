

<div class="container sdc_pro" id="projects">
    <div class="col-md-3">
        <div class="col-md-12" style="display: inline-flex;">
            <div><img src="img/Project Popup/Untitled-1.png"></div>
            <div><span style="font-size:24px;font-family:'raleway';padding-left:5px;">PROJECTS</span></div>
            <!--  <div id="closeProject">X</div> -->
        </div>
        <div class="col-md-12 box">
            <div class="container-2">
                <span class="icon"><i class="fa fa-search"></i></span>
                <form id="live-search" action="" class="styled" method="post">
                    <input type="text" name="filter" id="filter"  placeholder="Search..." />
                </form>

            </div>
        </div>
        <div class="col-md-12 checkNOw" ng-app="projectList">
            <div class="checkbox checkbox-primary"> 
                <input id="residential" type="checkbox" value="residential">
                <label for="residential">RESIDENTIAL</label>
            </div>
            <div class="checkbox checkbox-primary">                        
                <input id="commercial" type="checkbox" value="commercial">
                <label for="commercial">COMMERCIAL</label>
            </div>
            <div class="checkbox checkbox-primary">                        
                <input id="town-ship" type="checkbox" value="town-ship">
                <label for="town-ship">TOWN SHIP</label>
            </div>
        </div>
        <div class="col-md-12 toppadding10">
            Status 
            <select  class="filters-select-status">
                <option>ALL</option>
                <option id="in" value="in">IN Progress</option>
                <option id="on" value="on">OnGoing</option>
                <option id="up" value="up">UpComing</option>
                
            </select>
        </div>
        <div class="col-md-12 toppadding10">
            Location
            <select  class="filters-select-location ">
                <option id="rp pn jaipur" >Select</option>
                <option id="rp" value="rp">Raja Park</option>
                <option id="pn" value="pn">Pratap Nagar</option>
                <option id="jaipur" value="jaipur">Jaipur</option>
            </select>
        </div>
    </div>

    <div class="col-md-9 slideContect">
        <div id="projectSlide" role="listbox">
            <a href="#" ><i class="fa fa-chevron-left" id="left-button"></i></a>
         
          
                      <div class="shd_efct"> <!--<img src="img/Project Popup/1.jpg"></div>-->
                     
                            @foreach($data['project'] as $project) 
                               
                    
                            @if ($project->project_logo =='')

                            <img class="new img img-responsive" src="" style="display:none">

                            @else 
 

                            <td>      <div class="col-md-2 pn hideshow town-ship commercial in frm_left" data-category="residential">  <a  href="{{route('show.sdc.new',$project->project_id)}}">  <img class=""  src="{{url('resources/assets/admin/img/modules/projectlogo/'.$project->project_logo)}}" value="{{$project->project_id}}" style="width:110px;"  &nbsp; >
                                <div class="padr">
                              <ul><li class="pro_popup_heading "> {{$project->project_name}}</li>
                                  <li>{{$project->compactaddress}}</li>
                                  </div>
                                    
                          </a>     </div>   </td> 
                             
                      


                            @endif

                            @endforeach
                              
                   
                    <div class="padr">


      


                       

                        <!--                          <ul><li class="pro_popup_heading ">Keystone</li><li> Adarsh Nagar,Jaipur</li></ul>-->

                   
                </div> 
        </div>
    </div>
        
            <!--<a href="kproject.php">
                <div class="col-xs-2 pn hideshow col-md-2 col-sm-2 in commercial frm_left" data-category="commercial">
                    <div class="shd_efct"> @foreach($data['project'] as $project) 
                               
                    
                            @if ($project->project_logo =='')


                        
                            <img class="new img img-responsive" src="" style="display:none">

                            @else 







                            <td>   <a  href="{{route('show.sdc.new',$project->project_id)}}">  <img class=""  src="{{url('resources/assets/admin/img/modules/projectlogo/'.$project->project_logo)}}" value="{{$project->project_id}}" style="width:100px;"  &nbsp; >
                                <h4>  {{$project->project_name}}</h4>
                          </a>    </td> 
                             
                          </div>


                            @endif

                            @endforeach</div>
                    <div class="padr">
                        <ul><li class="pro_popup_heading ">SDC Prime</li><li>  Adarsh Nagar,Jaipur</li></ul>
                    </div>
                </div>
            </a>-->
          <!--  <div class="col-md-2 pn hideshow town-ship commercial up frm_left" data-category="commercial">
                <div  class="shd_efct"><img src="img/Project Popup/3.jpg" ></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Aura</li><li>Banipark, Jaipur Raj.</li></ul>
                </div>
            </div>

            <div class="col-xs-2 rp hideshow col-md-2 col-sm-2 residential on  frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/4.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Classic</li><li> Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 rp hideshow residential in frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/5.jpg"></div>
                <div class="padr" >

                </div>
            </div>

            <div class="col-md-2 rp hideshow residential on frm_left" data-category="residential">
                  <div class="shd_efct"><img src="img/Project Popup/6.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Exotica</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>


            <div class="col-md-2 pn hideshow commercial in frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/7.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Courtyard</li><li>Pratap Nagar, Jaipur</li></ul>  
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow town-ship up frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/8.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Anita</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow town-ship up commercial frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/9.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Millborn</li><li>Pratap Nagar, Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 pn hideshow commercial on town-ship residential frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/10.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Green Park</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>
-->


            <div class="col-md-2 rp hideshow town-ship commercial on frm_left" data-category="residential">
                <!-- <div class="shd_efct"><img src="img/Project Popup/1.jpg"></div>-->
  <!--              <div class="padr">
                    <ul><li class="pro_popup_heading ">Keystone</li><li> Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div> 

            <div class="col-md-2 pn hideshow on commercial frm_left" data-category="commercial">
                <div class="shd_efct"><img src="img/Project Popup/2.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Prime</li><li>  Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 pn jAipur hideshow in town-ship commercial frm_left" data-category="commercial">
                <div  class="shd_efct"><img src="img/Project Popup/3.jpg" ></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading">SDC Aura</li><li>Banipark, Jaipur Raj.</li></ul>
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow up residential   frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/4.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Classic</li><li> Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 rp hideshow up residential frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/5.jpg"></div>
                <div class="padr" >
                    <ul><li class="pro_popup_heading ">Ganesh Kripa</li><li>Tonk Road,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 rp hideshow up residential frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/6.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Exotica</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>


            <div class="col-md-2 rp hideshow in commercial frm_left" data-category="residential">
                <div class="shd_efct"><img src="img/Project Popup/7.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Courtyard</li><li>Pratap Nagar, Jaipur</li></ul>  
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow on town-ship frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/8.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">SDC Anita</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow on town-ship commercial frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/9.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Millborn</li><li>Pratap Nagar, Jaipur</li></ul>
                </div>
            </div>

            <div class="col-md-2 jaipur hideshow on commercial town-ship residential frm_left" data-category="town-ship">
                <div class="shd_efct"><img src="img/Project Popup/10.jpg"></div>
                <div class="padr">
                    <ul><li class="pro_popup_heading ">Green Park</li><li>Adarsh Nagar,Jaipur</li></ul>
                </div>-->
        </div>
            <a href="#" ><i class="fa fa-chevron-right" id="right-button"></i></a>
        </div>
            </div>
    </div>
</div>
</div>
<div id="myModalvideo" class="modal fade" role="dialog" style="height:2400px; width:2100px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          
         <iframe width="560" height="315" src="https://www.youtube.com/embed/uYHOfmjNhg8" frameborder="0" allowfullscreen></iframe>
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
