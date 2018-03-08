<html>
    <head>
        @include('admin.head')
    <link rel="stylesheet" type="text/css" href="{{url('resources/assets/admin/css/cms.css')}}" />
    </head>
    <body>
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed " >
            <nav id="sidebar">
                @include('admin.leftnav')
                
            </nav>
           
<main id="main-container">   
                <div class="content content-narrow">
                    @yield('content')
                </div>
     <ul>
        <li><a href = "{{route('get.page.list')}}">List</li>
        <li><a href = "{{route('get.page.edit')}}">Edit Page</li>
        <li><a href = "{{route('get.page.create')}}">Create page</li>
        <li><a href="{{route('show.gallery.type')}}">Create gallery</li>
        <li><a href="{{route('editgallery.page')}}">Edit gallery</li>
        <li><a href="{{route('show.page.new')}}">Create project</li>
        <li><a href="{{route('edit.page')}}">Edit project</li>
        </ul>
    </div>
 
 </main>

    @include('admin.footer')

       
    </body>
</html>
