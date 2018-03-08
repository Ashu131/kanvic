@extends('admin.master')
@section('title', 'Main page')
@section('page_title','Dashboard')
@section('css')
    {!! Html::style('plugins/validationengine/validationEngine.jquery.css') !!}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>Edit slide</h5></div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal validate" action="{{route('update.home.slide')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$slide->id}}">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" value="{{$slide->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="content">{!!$slide->content!!}</textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Images</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control multi with-preview" name="images[]" accept="jpg|jpeg" maxlength="1"/>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <div class='remove-im'>
                                               <img src="{{url('resources/assets/img/modules/slider/'.$slide->image)}}" height="auto" width="120"/>
                                            </div>
                                    </div>
                                    <input type="hidden" name="old_img" class="delImages" value="{{$slide->image}}">
                                </div> 
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control validate[required]" name="link" value="{{url($slide->link)}}">
                                    </div>
                                </div>
                            <div class="form-group"><label class="col-sm-2 control-label">Publish</label>
                            <div class="col-sm-3">
                                <select name="publish" class="form-control">
                                <option value="0" @if($slide->publish==0) selected @endif>No</option>
                                <option value="1" @if($slide->publish==1) selected @endif>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! Html::script('plugins/validationengine/languages/jquery.validationEngine-en.js') !!}
    {!! Html::script('plugins/validationengine/jquery.validationEngine.js') !!}
<script src="{{url('resources/assets/admin/js/plugins/tinymce/tinymce.min.js')}}"></script>

    <script type="application/javascript">
        $(document).ready(function () {
tinymce.init({ selector:'textarea' });
            $("form.validate").validationEngine('attach',
                    {
                        promptPosition: "bottomRight", scroll: false,
                        validate: true,
                        onValidationComplete: function (form, status) {
                            if (status)
                                return true;
                            return false;
                        }
                    });
        });
    </script>
@stop
