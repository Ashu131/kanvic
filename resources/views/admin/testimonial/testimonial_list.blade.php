@extends('admin.master')
@section('content')
<div class="block block-themed">
     <div class="block-header bg-primary">                
        <h3 class="block-title">Testimonials List</h3>

    </div>
    <div class="block-content">
    <a href="{{url('admin/testimonial/create')}}">Add Testimonial</a>


 <div class="cf nestable-lists">
     <div class="dd" id="nestableMenu">
      <ol class="dd-list">
     @foreach($data['testimonial'] as $testimonial)
                <li class="dd-item dd3-item" data-id="{{$testimonial->testimonial_id}}">
                    <div class="dd-handle dd3-handle">Drag</div>
                    <div class="dd3-content">
                    <div class="producttitle">
                         {{$testimonial->author}}
                    </div>
                   <div class="btncontanier">
                    <a href="{{route('admin.testimonial.edit',$testimonial->testimonial_id)}}"> <i class="fa fa-lg fa-edit"></i></a>
                    <a href="javascript:delete_id({{$testimonial->testimonial_id}})">
                            <i class="fa fa-lg fa-times"></i>
                    </a>

                    </div>
          </div>
              </li>
                       
           @endforeach
                       
                

            </ol>
            </div>
   </div><!-- nestable-lists close--> 
    </div>
</div>

<div id="baseurl" class="hide">{{url('')}}</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<link rel="stylesheet" href="{{url('resources/assets/admin/css/dragdropmenu.css')}}" />
<script src="{{url('resources/assets/admin/js/jquery.nestable.js')}}"></script>
<script src="{{url('resources/assets/admin/js/testimonial_sort.js')}}"></script>
<script>

    $(document).ready(function()
    {

            baseurl = $('#baseurl').text();
        /* The output is ment to update the nestableMenu-output textarea
         * So this could probably be rewritten a bit to only run the menu_updatesort function onchange
        */
        
        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        
        // activate Nestable for list menu
        $('#nestableMenu').nestable({
            group: 1
        })
        .on('change', updateOutput);
     
        // output initial serialised data
        updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

        $('#nestable-menu').on('click', function(e)
        {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();

    });
    </script>

<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        //window.location.href='index.php?delete_id='+id;
        window.location.href=baseurl+'/admin/get/testimonial/deletetesti/'+id;
    }
}
</script>


@endsection