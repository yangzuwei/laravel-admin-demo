<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">
<label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
<div class="col-sm-8">
@include('admin::form.error')
<div id="weditor">
    <div>{!! old($column, $value) !!} </div>
</div>
    <textarea class="form-control" style="visibility: hidden" name="{{$name}}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>
@include('admin::form.help-block')
</div>
</div>
