<style type="text/css">
    body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
    #allmap {width:100%;height:500px;}
</style>
<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">
<label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
<div class="col-sm-8">
@include('admin::form.error')

<div id="allmap"></div>

@include('admin::form.help-block')
    </div>
</div>
