@extends("layouts.home")

@section("page-css")
    <script src="http://api.map.baidu.com/api?v=2.0&ak=iGCrctBcE4tbKie9e59Vm9rYQOfSQPhB"></script>
@endsection

@section("child-content")

<!-- 内容-->

<div id="allmap" data-point="{{$point}}" style="height: 900px"></div>

<script>
var map = new BMap.Map("allmap");
map.enableScrollWheelZoom(true);
var new_point = document.getElementById("allmap").dataset.point;

if(new_point){

    var lnglat = new_point.split(',');
    var oldLng = lnglat[0];
    var oldLat = lnglat[1];
    var oldPoint = new BMap.Point(oldLng,oldLat);

    map.centerAndZoom(oldPoint,12);

    var marker = new BMap.Marker(oldPoint);  // 创建标注
    map.addOverlay(marker);
    map.panTo(oldPoint);
}else{
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            map.panTo(r.point);
        }
    },{enableHighAccuracy: true});

}

</script>

@endsection