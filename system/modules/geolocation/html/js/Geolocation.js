window.addEvent("domready",function(){$$(".geochange").chosen()});var GeoEdit=new Class({Implements:[Options],options:{debug:false,cookieLifeTime:1,messages:{}},initialize:function(a){this.setOptions(a)},setCookieLifetime:function(a){this.options.cookieLifeTime=a},setMessages:function(a){options={};options.messages=a;this.setOptions(options)},changeGeoLocation:function(b,a,e){var d=$(b).getSelected().get("text")[0];var c=$(b).getSelected().get("value")[0];if(typeof(REQUEST_TOKEN)!=="undefined"){data={action:"GeoChangeLocation",location:c,REQUEST_TOKEN:REQUEST_TOKEN}}else{data={action:"GeoChangeLocation",location:c}}if($(a)!=null){$(a).set("html",this.options.messages.geo_msc_Changing)}new Request.JSON({method:"post",url:"ajax.php?language="+e,data:data,evalScripts:false,evalResponse:false,onSuccess:function(g,f){if(typeof(REQUEST_TOKEN)!=="undefined"){REQUEST_TOKEN=g.token}if(g.content.success==true){var h={lat:g.content.lat,lon:g.content.lon,countryShort:c,mode:5};var i={duration:this.options.cookieLifeTime};Cookie.write("Geolocation",JSON.encode(h),i);window.location.reload()}else{if($(a)){$(a).set("html",g.content.error)}}}.bind(this),onFailure:function(g,f){if($(a)){$(a).set("html",this.options.messages.geo_err_NoConnection)}}.bind(this)}).send()}});var GeoUpdater=new GeoEdit();