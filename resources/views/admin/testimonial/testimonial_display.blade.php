@extends('admin.master')

@section('content')

 <div class="block block-themed">
    
    <div class="block-header bg-primary">                
        <h3 class="block-title">Testimonial</h3>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('failure'))
        <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif

        <div class="block-content">
             <form class="form-horizontal push-10-t push-10" action="{{route('post.testimonial',$data['testimonial']->title)}}" method="post">
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="title" name="title" value="{{$data['testimonial']->title}}">
                            <label for="title">Title</label>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="author" name="author" value="{{$data['testimonial']->author}}">
                            <label for="author">Author</label>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <textarea class="form-control" id="author_desc" name="author_desc">{{$data['testimonial']->author_desc}}</textarea>
                            <label for="author_desc">Author Description</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <textarea class="form-control" id="news_desc" name="news_desc">{{$data['testimonial']->news_desc}}</textarea>
                            <label for="news_desc">News Description</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('js')


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
