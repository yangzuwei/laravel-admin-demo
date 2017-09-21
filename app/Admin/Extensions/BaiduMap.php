<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class BaiduMap extends Field
{
   protected $view = 'admin.baidumap';//'admin::form.editor';

    protected static $css = [
        '',
    ];

    protected static $js = [
        'http://api.map.baidu.com/api?v=2.0&ak=iGCrctBcE4tbKie9e59Vm9rYQOfSQPhB',
    ];

    public function render()
    {
        $this->script = <<<EOT
        
	var map = new BMap.Map("allmap");
	map.enableScrollWheelZoom(true);
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,12);

    var location = $("input[name='location']").val();
    if(location){
        var lnglat = location.split(',');
        var oldLng = lnglat[0];
        var oldLat = lnglat[1];
        var oldPoint = new BMap.Point(oldLng,oldLat);
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

    var geoc = new BMap.Geocoder();    

    map.addEventListener("click", function(e){
        map.clearOverlays();
        var pt = e.point;
        geoc.getLocation(pt, function(rs){
            var addComp = rs.addressComponents;
            var address = addComp.province + addComp.city  + addComp.district  + addComp.street + addComp.streetNumber;
            $("#address").val(address);     
        });
        
        var marker = new BMap.Marker(pt);  // 创建标注
        map.addOverlay(marker); 
        
        location = pt.lng+","+pt.lat;
        //alert(location);
        $("input[name='location']").val(location);
    });
        
EOT;
        return parent::render();

    }
}