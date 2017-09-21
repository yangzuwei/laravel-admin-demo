
@extends('layouts.app')

@section('title', '页面标题')

@section('sidebar')

    <p>这个是侧边栏的子增加页面.</p>
@endsection

@section('content')
    <p>水到了.</p>
@endsection

{{--@component('alert')--}}
    {{--@slot('title')--}}
        {{--拒绝--}}
    {{--@endslot--}}

    {{--你没有权限访问这个资源！--}}
{{--@endcomponent--}}