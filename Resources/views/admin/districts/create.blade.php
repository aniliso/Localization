@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('localization::districts.title.create district') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.localization.district.index') }}">{{ trans('localization::districts.title.districts') }}</a></li>
        <li class="active">{{ trans('localization::districts.title.create district') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.localization.district.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::normalSelect('country_id', trans('localization::districts.form.country_id'), $errors, $countryLists) !!}

                    {!! Form::normalSelect('city_id', trans('localization::districts.form.city_id'), $errors, []) !!}
                </div>
            </div>
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('localization::admin.districts.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.localization.district.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.localization.district.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                }
            });
            var country_id = $("select[name=country_id]");
            var city_id = $("select[name=city_id]");
            country_id.select2();
            city_id.select2();
            getCities(country_id.val());
            country_id.change(function(){
                data = getCities(this.value);
            });
            function getCities(id) {
                $.ajax({
                    method: 'POST',
                    dataType: "json",
                    url: "{{ route('api.localization.cities') }}",
                    data: {id:id},
                    success: function (data) {
                       if(data.success) {
                           var output = [];
                           $.each(data.data, function(key, val) {
                               output.push('<option value="'+ key +'">'+ val +'</option>');
                           });
                           city_id.html(output.join(''));
                       } else {
                           city_id.html("<option>Sonuç Yok</option>");
                       }
                    }
                });
            }
        });
    </script>
@stop
