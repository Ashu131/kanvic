
@extends('admin.master')
@section('content')
<div class="block block-themed">
<a href="{{ url('admin/addproducts') }}"><button class="btn-success">Add Products</button></a>
    
    <div align="right">
    <form action="{{url('admin/importproductsCsv')}}" enctype="multipart/form-data" method="post">
    <input type="file" name="csvfile" required="required">
    {{csrf_field()}}
    <input type="submit" name="import" value="Import Products" class="btn-success">
    </form>
    </div>
    <label>Fliter Product on Categories</label>
    
    <form class="filterproduct" method="post" action="{{url()}}/admin/filterproduct">
    {{csrf_field()}}

    <select name="catId" id="catid">
    <option <?php if($data['selectdCat'] == 0); echo 'selected="selected"';?> value="0">All</option>
    @foreach($data['categoriesList'] as $categoriesList )
        <option <?php if($data['selectdCat'] == $categoriesList->id){ echo 'selected="selected"'; }?> value="{{$categoriesList->id}}"> {{$categoriesList->category_name}}</option>
    @endforeach
     </select>
    </form>

 <div class="cf nestable-lists">
	 <div class="dd" id="nestableMenu">
	  <ol class="dd-list">
      
      @foreach($data['products'] as $products)
		       	<li class="dd-item dd3-item" data-id="{{$products->id}}">
                    <div class="dd-handle dd3-handle">Drag</div>
                    <div class="dd3-content">
                    <div class="producttitle">
                         {{$products->product_name}}
                    </div>
                    
                    <div>@if($products->status == 1) Free Product @endif @if($products->status == 2) Private Product @endif @if($products->status == 0) Product Blocked @endif</div>
                    
                    
                    <div class="btncontanier">
                    <a href="{{route('get.products.edit',$products->id)}}"> 
                <i class="fa fa-lg fa-edit"></i></a>
                <a href="{{route('get.products.edit',$products->id)}}"> 
                </a>
                <a href="{{route('get.products.delete',$products->id)}}"> 
                    <i class="fa fa-lg fa-times"></i>
                </a>

			</div>
                    
                    
                    
                    
     				</div>
              </li>
                       
           @endforeach
                       
                

			</ol>
			</div>
   </div><!-- nestable-lists close-->    
    
    
    
    
    
    
    
    
    
    
    
    
     
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Status</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <!-- <tr>
        <td>John</td>
        <td>john@example.com</td>
      </tr> -->
        @foreach($data['products'] as $products)
            <tr>
                <td>
                <a href="{{route('get.products.edit',$products->id)}}">{{$products->product_name}}</a>
                </td>
                <td>
                @if($products->status == 1) Free Product @endif @if($products->status == 2) Private Product @endif @if($products->status == 0) Product Blocked @endif
                </td>
                <td><a href="{{route('get.products.edit',$products->id)}}"> 
                <i class="fa fa-lg fa-edit"></i></a>
                <a href="{{route('get.products.edit',$products->id)}}"> 
                </a>
                <a href="{{route('get.products.delete',$products->id)}}"> 
                    <i class="fa fa-lg fa-times"></i>
                </a></td>
            </tr>
        @endforeach
      
    </tbody>
  </table>


     <a href = "{{url('/admin')}}">BACK TO Home</a>
</div>


@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<link rel="stylesheet" href="{{url('resources/assets/admin/css/dragdropmenu.css')}}" />
<script src="{{url('resources/assets/admin/js/jquery.nestable.js')}}"></script>
<script src="{{url('resources/assets/admin/js/functions.js')}}"></script>

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

		$('#nestable3').nestable();

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