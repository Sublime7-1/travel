!function(){function e(){return window.G&&window.G.isWeApp||document.cookie.indexOf("tuniu_webview_env=miniprogram")>-1||window.__wxjs_environment&&"miniprogram"===window.__wxjs_environment}function t(){var e=l(window.location).p||atob(decodeURIComponent(o("tuniu_partner"))).replace(/^([^,]+),.+$/,"$1")||200,t=[34308];return!!~t.indexOf(+e)}function n(){var e=navigator.userAgent.toLowerCase(),t=/(ipad).*os\s([\d_]+)/.test(e),n=/(ipod)(.*os\s([\d_]+))?/.test(e),i=!t&&/(iphone\sos)\s([\d_]+)/.test(e);return{isTencent:/micromessenger/.test(e)||/qq/.test(e),isWechat:/micromessenger/.test(e),isAndroid:/android/.test(e),isIOS:t||n||i}}function i(e,t){return s.isTencent?s.isAndroid&&e?{appUrl:"",mUrl:"http://a.app.qq.com/o/simple.jsp?pkgname=com.tuniu.app.ui&android_schema="+encodeURIComponent(e)}:s.isWechat?{appUrl:"",mUrl:"http://a.app.qq.com/o/simple.jsp?pkgname=com.tuniu.app.ui"}:{appUrl:e||"",mUrl:"http://a.app.qq.com/o/simple.jsp?pkgname=com.tuniu.app.ui"}:{appUrl:e||"",mUrl:t?t:"http://m.tuniu.com/appDownload/index/p/"+r()}}function o(e){var t=document.cookie.match(new RegExp("(^| )"+e+"=([^;]*)(;|$)"));return null!==t?t[2]:""}function a(e,t,n){var i=new Date;i.setTime(i.getTime()+24*n*60*60*1e3);var o="expires="+i.toUTCString()+";domain=.tuniu.com;path=/";document.cookie=e+"="+t+"; "+o}function l(e){for(var t=e.hash?e.hash.slice(1).split("&"):[].concat(e.search?e.search.slice(1).split("&"):[]),n={},i=0;i<t.length;i++){var o=t[i].split("=");n[o[0]]=o[1]}return n}function r(){var e=l(window.location);if(e.p)return a("appDownload",e.p,1),e.p;var t=o("appDownload");if(!(document.referrer&&/p=\d+/.test(document.referrer)||document.referrer&&t&&200!=t))return a("appDownload",200,1),200;if(t){var n=/p=\d+/.test(document.referrer)?document.referrer.split("p=")[1].match(/\d+/):"";return a("appDownload",n||t,1),n||t}return""}function d(){var e=window.atob(unescape(o("tuniuuser_citycode")));return e||localStorage.getItem("autoGPS")&&(e=JSON.parse(localStorage.getItem("autoGPS")).code),e||2500}function c(){var e,t="";if((e=document.getElementById("app_config_url"))&&e.value){s.isAndroid&&(t=f.attr(e,"data-android")),t||(t=e.value);var n=r();n&&(t+=/\?+/.test(t)?"&pValue="+n:"?pValue="+n)}return t}function u(){return""==document.referrer||document.referrer.indexOf("tuniu.com")==-1||"https:"==window.location.protocol&&window.location.href.replace(/https:\/\/([^#\?]+).*/,"http://$1")==document.referrer}if(!(window.downloadInited||e()||t())){var p=!1,s=n(),m=localStorage.getItem("app_download");if(m=m?JSON.parse(m):{},document.cookie.indexOf("deviceType")==-1&&!localStorage.getItem("zipLocation")&&27187!=r()){if(/baidu/.test(document.referrer)&&!l(window.location).p)return;var g=new XMLHttpRequest;g.open("get","/api/TrafficGuide/index?url="+encodeURIComponent(window.location.href)+"&citycode="+d()+"&p="+r()+"&LP="+(u()?1:0)),g.onreadystatechange=function(){if(4==g.readyState&&200==g.status&&!e()){var t={};window.location.hash.indexOf("clear")>-1&&(localStorage.removeItem("app_download"),localStorage.removeItem("app_download_appurl_call_failed")),t=JSON.parse(g.responseText||"{}"),setTimeout(function(){if(document.getElementById("app_download_ajax_return")&&(t=JSON.parse(document.getElementById("app_download_ajax_return").value)),t.success){for(var e=t.data.GTInfo,n=0;n<e.length;n++){var i=e[n].activity_id,o=e[n].activity_frequence;m[i]&&(new Date).getTime()-m[i].lastTime<3600*o*24*1e3&&C[e[n].activity_style]?C[e[n].activity_style](e[n],!0):C[e[n].activity_style]&&C[e[n].activity_style](e[n],!1)}P()}},localStorage.getItem("M_PROTOTYPE_TESTAPPDOWNLOAD")?JSON.parse(localStorage.getItem("M_PROTOTYPE_TESTAPPDOWNLOAD")).data.ajaxSleepTime:0)}},g.send(null)}var f={newElement:function(e,t){var n=document.createElement(e);for(var i in t||{})n.style[i]=t[i];return n},attr:function(e,t,n){return n?void(e&&e.setAttribute(t,n)):e&&e.getAttribute(t)}},w=function(e){m[e]=m[e]||{},m[e].lastTime=(new Date).getTime(),localStorage.setItem("app_download",JSON.stringify(m))},b=function(e,t){if(t=t||"location",e)if("location"==t)window.location.href=e;else{if(document.getElementById("tuniuappCallIFrame"))n=document.getElementById("tuniuappCallIFrame"),f.attr(n,"src",e);else{var n=f.newElement("iframe",{display:"none"});n.id="tuniuappCallIFrame",f.attr(n,"src",e)}document.getElementsByTagName("body")[0].appendChild(n)}},y=function(e){var t=navigator.userAgent,n=s.isAndroid&&/(ucbrowser|mqqbrowser|sogoumse,sogoumobilebrowser|baidubrowser|aphone browser|liebaofast)/i.test(t)||s.isIOS;n?b(e,"location"):b(e,"iframe")},v=function(e){e&&(window.location.href=e)},_=function(){var e={};try{e=JSON.parse(localStorage.getItem("app_download_appurl_call_failed"))||{}}catch(t){e={}}return e},h=function(e){var t=_();return!(!t||!t[e])&&(!(!t[e].expireTime||t[e].expireTime<=(new Date).getTime())||(x(e),!1))},k=function(e){var t=_();t[e]={expireTime:(new Date).getTime()+864e5},localStorage.setItem("app_download_appurl_call_failed",JSON.stringify(t))},x=function(e){var t=_();t[e]&&delete t[e],localStorage.setItem("app_download_appurl_call_failed",JSON.stringify(t))},S=function(e,t,n){p=!1,window.APPOPENSUCCESSTIMER&&clearInterval(window.APPOPENSUCCESSTIMER),e=e||2e3;var i=(new Date).getTime(),o=0,a=!1;window.APPOPENSUCCESSTIMER=setInterval(function(){var l=(new Date).getTime();return o?(o>i+e&&(window.APPOPENSUCCESSTIMER&&clearInterval(window.APPOPENSUCCESSTIMER),a=!0,l-i>e+29?(p=!0,t&&"function"==typeof t.success&&t.success()):p||t&&"function"==typeof t.failed&&t.failed()),void(l-o>150?(p=!0,t&&"function"==typeof t.success&&t.success(),window.APPOPENSUCCESSTIMER&&clearInterval(window.APPOPENSUCCESSTIMER)):(p=!1,"click"==n&&a&&t&&"function"==typeof t.failed&&t.failed(),o=l))):void(o=l)},20)},T=function(e,t,n){var o=c(),a={appUrl:o,mUrl:""};if(a=i(o,e),a.appUrl){(new Date).getTime();b(a.appUrl),S(n,{failed:function(){v(a.mUrl)}},"click")}else v(a.mUrl)},I=function(e,t){var n=c();if(n){(new Date).getTime();y(n),S(t,{failed:function(){k(e)}})}},E=function(e){return e.replace(/^http:|^https:/g,"")},C={0:function(e,t,n,i,o){},1:function(e,t){if(!t){var n,i=e.activity_id,o=e.activity_frequence;if(!(m[i]&&(new Date).getTime()-m[i].lastTime<3600*o*24*1e3)){var a=E(e.bkg.bkg_url),l=E(e.button_close.img_url),r=f.newElement("div",{position:"fixed",paddingTop:"112.21%",width:"93.47%",left:"3.26%",top:"50%",backgroundImage:"url("+a+")",backgroundSize:"100%",zIndex:"99999",webkitTransform:"translate(0,-50%)"}),d=f.newElement("div",{position:"absolute",right:"5.8%",top:"0",marginTop:"3px",marginLeft:"-3px",width:"6.93%",paddingTop:"6.93%",backgroundImage:"url("+l+")",backgroundSize:"100% 100%"});d.onclick=function(){g.style.display="none",w(e.activity_id)},r.appendChild(d);for(var c=e.button_other,u=["7.5%","52%"],p=0;p<u.length;p++){var s=f.newElement("a",{position:"absolute",left:u[p],bottom:"18px",width:"40.5%",paddingTop:"14.53%",backgroundImage:"url("+E(c[p].url)+")",backgroundSize:"100% 100%"});s.href=c[p].btn_url||"###",r.appendChild(s)}var g=f.newElement("div",{position:"fixed",width:"100%",height:"100%",background:"rgba(0,0,0,.5)",zIndex:999,left:"0",top:"0"});g.appendChild(r),document.body.appendChild(g),e.activity_closelimit&&(n=setTimeout(function(){g.style.display="none",w(e.activity_id)},1e3*e.activity_closelimit))}}},2:function(e,t){if(!t){var n,i=E(e.bkg.bkg_url),o=E(e.button_close.img_url),a=f.newElement("div",{position:"fixed",height:"100%",width:"100%",left:"0",bottom:"-1px",backgroundImage:"url("+i+")",backgroundSize:"100%",zIndex:"99999"}),l=f.newElement("div",{position:"absolute",left:"10px",top:"10px",width:"6.93%",paddingTop:"6.93%",backgroundImage:"url("+o+")",backgroundSize:"100% 100%"});l.onclick=function(){w(e.activity_id),a.style.display="none"},a.appendChild(l);for(var r=e.button_other,d=["18.5%","9.2%"],c=0;c<d.length;c++){var u=f.newElement("a",{position:"absolute",left:"8.8%",bottom:d[c],width:"82.4%",paddingTop:"14.53%",backgroundImage:"url("+E(r[c].url)+")",backgroundSize:"100% 100%"});u.href=r[c].btn_url||"###",a.appendChild(u)}document.body.appendChild(a),e.activity_closelimit&&(n=setTimeout(function(){a.style.display="none",w(e.activity_id)},1e3*e.activity_closelimit))}},3:function(e,t){if(!t){var n,i=function(){var e=window.innerWidth,t=1;return fontSize=12,e>=640&&(e/=2,t=2),e>=414?fontSize=15:e>=340&&e<414?fontSize=14:fontSize=12,fontSize*t+"px"},o=document.referrer;if(""!=o){var a=o.split("/");if(a[2].indexOf("m.tuniu.com")==-1&&""!=e.button_other[1].url){var l=E(e.button_other[1].url);e.button_other[1].btn_url}else{var l=E(e.bkg.bkg_url);e.bkg.bkg_linkurl}}else{var l=E(e.bkg.bkg_url);e.bkg.bkg_linkurl}var r=E(e.button_close.img_url),d={isCustom:!(!e.button_other||!e.button_other[0]||1!=e.button_other[0].btn_url),bg:e.button_other&&e.button_other[0]&&e.button_other[0].url?e.button_other[0].url:""},c=f.newElement("div",{position:"relative",paddingTop:"16.53%",width:"100%",backgroundImage:"url("+l+")",backgroundSize:"100% 100%",zIndex:"100"}),u=f.newElement("div",{position:"absolute",left:"0px",top:"0px",zIndex:"5",width:"8.54%",paddingTop:"8.54%",backgroundImage:"url("+r+")",backgroundSize:"100% 100%"});u.onclick=function(){c.style.display="none",w(e.activity_id)};var p=f.newElement("a",{position:"absolute",left:"0",top:"0",width:"100%",height:"100%",background:"#000",opacity:0,zIndex:"4",backgroundSize:"100% 100%"});if(f.attr(p,"id","clickArea"),f.attr(p,"m","点击_引流广告_顶部样式___打开APP"),c.appendChild(p),c.appendChild(u),c.classList.add("app-download-box-hook-type-"+e.activity_style),d.isCustom&&d.bg){var s=f.newElement("span",{position:"absolute",top:0,paddingTop:"3.2%",left:"22.67%",fontSize:i(),width:"50%",height:"30px",zIndex:1,color:"#fff",whiteSpace:"nowrap",textOverflow:"ellipsis",overflow:"hidden"});c.appendChild(s),f.attr(c,"data-custom-bg",E(d.bg)),f.attr(c,"data-default-bg",l),c.classList.add("app-download-need-change-text"),c.style.display="none"}p.ontouchstart=function(){document.getElementById("clickArea").style.opacity="0.3"},p.ontouchend=function(){document.getElementById("clickArea").style.opacity="0"},p.onclick=function(){var t=e.bkg.bkg_linkurl;return T(t,e.activity_id),window.event.returnValue=!1,!1},u.onclick=function(){c.style.display="none",w(e.activity_id)};var m=document.querySelector(".wrapper")||document.getElementById("J_appDownloadRenderBox")||document.getElementById("content")||document.body;0==m.children.length?m.appendChild(c):m.insertBefore(c,m.firstChild),e.activity_closelimit&&(n=setTimeout(function(){c.style.display="none",w(e.activity_id)},1e3*e.activity_closelimit))}},4:function(e,t){if(!t){var n,i=E(e.bkg.bkg_url),o=E(e.button_close.img_url),a=f.newElement("div",{position:"fixed",paddingTop:"38.27%",width:"100%",left:"0",bottom:"-1px",backgroundImage:"url("+i+")",backgroundSize:"100% 100%",zIndex:"99999"}),l=f.newElement("div",{position:"absolute",right:"11px",top:"25px",width:"8.54%",paddingTop:"8.54%",backgroundImage:"url("+o+")",backgroundSize:"100% 100%"});l.onclick=function(){a.style.display="none",w(e.activity_id)},a.appendChild(l);var r=e.button_other,d=f.newElement("a",{position:"absolute",left:"58.8%",bottom:"8px",width:"37.3%",paddingTop:"9.325%",backgroundImage:"url("+E(r[0].url)+")",backgroundSize:"100% 100%"});d.href=r[0].btn_url||"###",a.appendChild(d),document.body.appendChild(a),e.activity_closelimit&&(n=setTimeout(function(){a.style.display="none",w(e.activity_id)},1e3*e.activity_closelimit))}},5:function(e,t){var n,i=E(e.bkg.bkg_url),o=E(e.button_close.img_url),a=f.newElement("div",{position:"fixed",paddingTop:"19.6%",width:"100%",left:"0",bottom:"-1px",backgroundImage:"url("+i+")",backgroundSize:"100% 100%",zIndex:"99999",webkitTransition:"left 1s"}),l=f.newElement("div",{position:"absolute",right:"0",top:"0",width:"9.6%",height:"100%",backgroundImage:"url("+o+")",backgroundRepeat:"no-repeat",backgroundPosition:"center center",backgroundSize:"100%"});l.onclick=function(){clearTimeout(n),w(e.activity_id),a.style.left="-100%",setTimeout(function(){c.style.display="block"},1e3)},a.appendChild(l);var r=e.button_other,d=f.newElement("a",{position:"absolute",left:"58.8%",top:"50%",width:"27.2%",paddingTop:"10.09%",backgroundImage:"url("+E(r[0].url)+")",backgroundSize:"100% 100%",webkitTransform:"translate(0,-50%)"});d.href=r[0].btn_url||"###",a.appendChild(d);var c=f.newElement("div",{position:"fixed",left:"14px",bottom:"14px",zIndex:"999",width:"12.8%",paddingTop:"12.8%",backgroundImage:"url("+E(r[1].url)+")",backgroundSize:"100% 100%",display:"none"});c.onclick=function(){c.style.display="none",a.style.left="0"},t&&(c.style.display="block",a.style.left="-100%"),document.body.appendChild(a),document.body.appendChild(c),e.activity_closelimit&&(n=setTimeout(function(){a.style.left="-100%",w(e.activity_id),setTimeout(function(){c.style.display="block"},1e3)},1e3*e.activity_closelimit))},7:function(e,t){var n,i=E(e.bkg.bkg_url),o=E(e.button_close.img_url),a=f.newElement("div",{position:"fixed",paddingTop:"28.27%",width:"100%",left:"0",bottom:"-1px",backgroundImage:"url("+i+")",backgroundSize:"100% 100%",zIndex:"99999"}),l=f.newElement("div",{position:"absolute",left:"5px",top:"0px",width:"8.53%",paddingTop:"8.53%",backgroundImage:"url("+o+")",backgroundSize:"100% 100%",webkitTransform:"translate(0,-50%)"});l.onclick=function(){w(e.activity_id),clearTimeout(n),c.style.display="block",a.style.display="none"},a.appendChild(l);var r=e.button_other,d=f.newElement("a",{position:"absolute",left:"58.8%",bottom:"8px",width:"37.3%",paddingTop:"9.325%",backgroundImage:"url("+E(r[0].url)+")",backgroundSize:"100% 100%"});d.href=r[0].btn_url||"###",a.appendChild(d);var c=f.newElement("div",{position:"fixed",left:"14px",bottom:"14px",zIndex:"999",width:"15.93%",paddingTop:"21.33%",backgroundImage:"url("+E(r[1].url)+")",backgroundSize:"100% 100%",display:"none"});c.onclick=function(){c.style.display="none",a.style.display="block"},t&&(c.style.display="block",a.style.display="none"),document.body.appendChild(a),document.body.appendChild(c),e.activity_closelimit&&(n=setTimeout(function(){w(e.activity_id),c.style.display="block",a.style.display="none"},1e3*e.activity_closelimit))},1000:function(e,t){if(!t){var n=e.activity_frequence,i=e.activity_id;if(!(m[i]&&(new Date).getTime()-m[i].lastTime<3600*n*24*1e3||h(i))){var o=r();/baidu/.test(document.referrer)&&200==o||I(i,8e3),w(i)}}},19:function(e,t){if(!t&&u()){var n=document.createElement("script"),i=e.bkg.bkg_linkurl||"//img2.tuniucdn.com/event/201701061314/newUserCoupon/dist/js/msite.min.js";n.setAttribute("src",i),document.head.appendChild(n),w(e.activity_id)}},21:function(e,t){function n(){var n,i=document.body.scrollHeight,o=window.innerHeight,a=document.getElementsByClassName("app_download_seemore")[0],l=a.getBoundingClientRect(),r=window.scrollY,d=E(e.button_close.img_url),c=E(e.bkg.bkg_url),u=f.newElement("div",{textAlign:"center",width:"100%",position:"absolute",bottom:"0px",height:"150px",zIndex:1e4}),p=f.newElement("div",{height:"40px",backgroundImage:"linear-gradient(-180deg, rgba(255,255,255,0.00) 0%, #FFFFFF 100%)"});u.appendChild(p);var s=f.newElement("div",{height:"110px",display:"flex",flexDirection:"column",alignItems:"center",background:"#ffffff"}),m=f.newElement("h1",{height:"10px",width:"12px",marginTop:"10px",background:"url("+d+")",backgroundSize:"cover"});f.attr(m,"m","点击_引流广告_折叠引流___内容展开");var g=f.newElement("a",{height:"30px",display:"block",width:"80%",marginTop:"30px",background:"url("+c+")",backgroundSize:"100% 100%"});f.attr(g,"m","点击_引流广告_折叠引流___下载APP"),s.appendChild(m),s.appendChild(g),u.appendChild(s),t&&(u.style.display="none"),i>2*o&&(a.style.height=2*o-l.top-r+"px",a.style.overflow="hidden",a.parentElement.style.position="relative",a.parentElement.appendChild(u)),g.onclick=function(){var t=e.bkg.bkg_linkurl;return T(t,e.activity_id),window.event.returnValue=!1,!1},m.onclick=function(e){u.style.display="none",a.style.height="100%",a.style.overflow="scroll"},e.activity_closelimit&&(n=setTimeout(function(){w(e.activity_id),u.style.display="none"},1e3*e.activity_closelimit))}t||!function i(){document.getElementsByClassName("app_download_seemore")[0]?n():setTimeout(i,300)}()}},z={changeText:function(e,t){var n=document.querySelectorAll(".app-download-need-change-text.app-download-box-hook-type-"+(t||3));if(n&&3==t)for(var i=0;i<n.length;i++)n[i].querySelector("span")&&e?(f.attr(n[i],"data-custom-bg")&&(n[i].style.backgroundImage="url("+f.attr(n[i],"data-custom-bg")+")"),n[i].querySelector("span").innerHTML=e):f.attr(n[i],"data-default-bg")&&(n[i].style.backgroundImage="url("+f.attr(n[i],"data-default-bg")+")"),n[i].style.display=""}},P=function(){window.AppDownloadBridge||(window.AppDownloadBridge=z),window.AppDownloadBridgeReadyListener&&window.AppDownloadBridgeReadyListener.forEach(function(e,t){"function"==typeof e&&e.call(window.AppDownloadBridge)});var e=document.querySelectorAll('[name="app_download_custom_text"]');if(e)for(var t=0;t<e.length;t++)z.changeText(e[t].value,f.attr(e[t],"data-type"))};window.downloadInited=!0}}();