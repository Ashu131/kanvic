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
            <div class="ibox-title"><h5>Add New slider</h5></div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal validate" action="{{route('save.new.home.slide')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="baseurl" value="{{url('')}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" value="{{old('content')}}"></textarea>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group"><label class="col-sm-2 control-label">Image link</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="link" value="{{old('link')}}">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Images</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control multi with-preview" name="images[]" accept="jpg|jpeg" maxlength="1"/>
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>

                        <div class="form-group"><label class="col-sm-2 control-label">Publish</label>
                            <div class="col-sm-3">
                                <select name="publish" class="form-control">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Save</button>
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
            //$(".select2_demo_2").select2();

        });
    </script>
@stop
