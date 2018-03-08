
@extends('admin.master')
@section('content')
<div class="block block-themed">
<a href="{{ url('admin/addcategories') }}"><button class="btn-success">Add categories</button></a>
    <div class="block-content">
        <div class="list-group">
        
        
         <div class="cf nestable-lists">
	 <div class="dd" id="nestableMenu">
	  <ol class="dd-list">
        
        
                   @foreach($data['categories'] as $categories)
          
				<li class="dd-item dd3-item" data-id="{{$categories->id}}">
                    <div class="dd-handle dd3-handle">Drag</div>
                    <div class="dd3-content">
                    <div class="producttitle">
                         {{$categories->category_name}}
                    </div>

                    <div class="btncontanier">
                   <a href="{{route('get.categories.edit',$categories->id)}}"> 
                <i class="fa fa-lg fa-edit"></i></a>
                <a href="{{route('get.categories.edit',$categories->id)}}"> 
                </a>

                <a href="{{route('get.categories.delete',$categories->id)}}"> 
                    <i class="fa fa-lg fa-times"></i>
                </a>

			</div>
                    
                    
                    
                    
     				</div>
                    
                    
                @if(count($subproducts[$categories->id])>0)          
				<ol class="dd-list">
        @foreach($subproducts[$categories->id] as $sublist)
             <li class="dd-item dd3-item" data-id="{{$sublist->id}}" id="{{$sublist->id}}">
             
                    <div class="dd-handle dd3-handle"></div>
              
			<div class="dd3-content id="id_{{$sublist->id}}">
            <div class="producttitle">
                         {{$sublist->category_name}}
                    </div>
                    
                    <div class="btncontanier">
                   <a href="{{route('get.categories.edit',$sublist->id)}}"> 
                <i class="fa fa-lg fa-edit"></i></a>
                <a href="{{route('get.categories.edit',$sublist->id)}}"> 
                </a>

                <a href="{{route('get.categories.delete',$sublist->id)}}"> 
                    <i class="fa fa-lg fa-times"></i>
                </a>

			</div>
            </div>
                            
							</li>
   
                                 
         @endforeach
                            
        </ol>
        		@endif
                    
                    
                    
                    
              </li>
             @endforeach
    
        

             </ol>
           </div>
        </div>
        </div>
    </div>
     <a href = "{{url('/admin')}}">BACK TO Home</a>
</div>

<div id="baseurl">{{url('')}}</div>

@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<link rel="stylesheet" href="{{url('resources/assets/admin/css/dragdropmenu.css')}}" />
<script src="{{url('resources/assets/admin/js/jquery.nestable_category.js')}}"></script>
<script src="{{url('resources/assets/admin/js/product_category_sort.js')}}"></script>

<script>

	$(document).ready(function()
	{
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
	});
	</script>




@if(Session::has('success'))
<script>
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-check',
            title: 'Success: ',
            message: '{{Session::get('success')}}', 
        },{
            allow_dismiss: true,
            type: 'success',
            placement: {
                from: "top",
                align: "center"
            },
        });
    });
</script>
@endif
@endsection