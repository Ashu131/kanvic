<div>
    <div class="container sdc_pro" id="projects">
        <div class="col-md-3">
        <div id="msg"></div>
            <form id="showcentre" method="post">
                <div class="col-md-12 toppadding10">
                    <select  class="filters-select-location " name="location">
                        <option value="">Select location</option>
                        <?php
                         $loc = array(); 
                        ?>
                        @foreach($project as $single_project)
                        @if(!in_array($single_project->location, $loc))
                        <?php array_push($loc,$single_project->location);  ?>
                        <option value="{{$single_project->location}}">{{$single_project->location}}</option>
                        @endif
                       @endforeach
                    </select>
                </div>
                <div class="col-md-12 toppadding10">
                    Select city
                     <select class="filters-select-location" name="city">
                        <option value="">Select city</option>
                        <?php
                         $city = array(); 
                        ?>
                        @foreach($project as $single_project)
                        @if(!in_array($single_project->city, $city))
                        <?php array_push($city,$single_project->city);  ?>
                        <option value="{{$single_project->city}}">{{$single_project->city}}</option>
                        @endif
                       @endforeach
                    </select>
                </div>

                <input type="submit" value="search">
            </form>


    <div id="centrelist">
        @foreach($project as $centre)
        <div>j-
            <p>{{$centre->address}}</p>
            <p>{{$centre->contact_number}}</p>
            <p>{{$centre->timing}}</p>
        </div>
        @endforeach

    </div>
       
        </div>

        <div class="col-md-9 slideContect">
            <div id="projectSlideOuter" class="clearfix">
                <div id="projectSlide" class="clearfix">

                <div id="map"></div>
                             


                    @foreach($project as $single_project)
                    <?php 
                    $class = str_replace('/','-',$single_project->type);
                    ?>


                    @endforeach
                </div>
            </div>


        </div>

    </div>
</div>