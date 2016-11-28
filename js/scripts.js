function FormCheck(e){var t=$(this);console.warn("test2"),console.warn(t),t.children("input").each(function(e,t){console.log("test3"),console.log($(this).val())})}!function(){for(var e,t=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],a=n.length,r=window.console=window.console||{};a--;)e=n[a],r[e]||(r[e]=t)}(),"undefined"==typeof jQuery?console.warn("jQuery hasn't loaded"):console.log("jQuery has loaded"),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e(require("jquery")):e(jQuery||Zepto)}(function(e){var t=function(t,n,a){t=e(t);var r,o=this,i=t.val();n="function"==typeof n?n(t.val(),void 0,t,a):n;var s={invalid:[],getCaret:function(){try{var e,n=0,a=t.get(0),r=document.selection,o=a.selectionStart;return r&&-1===navigator.appVersion.indexOf("MSIE 10")?(e=r.createRange(),e.moveStart("character",t.is("input")?-t.val().length:-t.text().length),n=e.text.length):(o||"0"===o)&&(n=o),n}catch(i){}},setCaret:function(e){try{if(t.is(":focus")){var n,a=t.get(0);a.setSelectionRange?a.setSelectionRange(e,e):a.createTextRange&&(n=a.createTextRange(),n.collapse(!0),n.moveEnd("character",e),n.moveStart("character",e),n.select())}}catch(r){}},events:function(){t.on("keyup.mask",s.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){t.keydown().keyup()},100)}).on("change.mask",function(){t.data("changed",!0)}).on("blur.mask",function(){i===t.val()||t.data("changed")||t.triggerHandler("change"),t.data("changed",!1)}).on("keydown.mask, blur.mask",function(){i=t.val()}).on("focus.mask",function(t){!0===a.selectOnFocus&&e(t.target).select()}).on("focusout.mask",function(){a.clearIfNotMatch&&!r.test(s.val())&&s.val("")})},getRegexMask:function(){for(var e,t,a,r,i=[],s=0;s<n.length;s++)(e=o.translation[n.charAt(s)])?(t=e.pattern.toString().replace(/.{1}$|^.{1}/g,""),a=e.optional,(e=e.recursive)?(i.push(n.charAt(s)),r={digit:n.charAt(s),pattern:t}):i.push(a||e?t+"?":t)):i.push(n.charAt(s).replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));return i=i.join(""),r&&(i=i.replace(RegExp("("+r.digit+"(.*"+r.digit+")?)"),"($1)?").replace(RegExp(r.digit,"g"),r.pattern)),RegExp(i)},destroyEvents:function(){t.off("keydown keyup paste drop blur focusout ".split(" ").join(".mask "))},val:function(e){var n=t.is("input")?"val":"text";return 0<arguments.length?(t[n]()!==e&&t[n](e),n=t):n=t[n](),n},getMCharsBeforeCount:function(e,t){for(var a=0,r=0,i=n.length;r<i&&r<e;r++)o.translation[n.charAt(r)]||(e=t?e+1:e,a++);return a},caretPos:function(e,t,a,r){return o.translation[n.charAt(Math.min(e-1,n.length-1))]?Math.min(e+a-t-r,a):s.caretPos(e+1,t,a,r)},behaviour:function(t){t=t||window.event,s.invalid=[];var n=t.keyCode||t.which;if(-1===e.inArray(n,o.byPassKeys)){var a=s.getCaret(),r=s.val().length,i=a<r,l=s.getMasked(),c=l.length,f=s.getMCharsBeforeCount(c-1)-s.getMCharsBeforeCount(r-1);return s.val(l),!i||65===n&&t.ctrlKey||(8!==n&&46!==n&&(a=s.caretPos(a,r,c,f)),s.setCaret(a)),s.callbacks(t)}},getMasked:function(e){var t,r,i=[],l=s.val(),c=0,f=n.length,u=0,d=l.length,p=1,h="push",m=-1;for(a.reverse?(h="unshift",p=-1,t=0,c=f-1,u=d-1,r=function(){return-1<c&&-1<u}):(t=f-1,r=function(){return c<f&&u<d});r();){var v=n.charAt(c),g=l.charAt(u),k=o.translation[v];k?(g.match(k.pattern)?(i[h](g),k.recursive&&(-1===m?m=c:c===t&&(c=m-p),t===m&&(c-=p)),c+=p):k.optional?(c+=p,u-=p):k.fallback?(i[h](k.fallback),c+=p,u-=p):s.invalid.push({p:u,v:g,e:k.pattern}),u+=p):(e||i[h](v),g===v&&(u+=p),c+=p)}return e=n.charAt(t),f!==d+1||o.translation[e]||i.push(e),i.join("")},callbacks:function(e){var r=s.val(),o=r!==i,l=[r,e,t,a],c=function(e,t,n){"function"==typeof a[e]&&t&&a[e].apply(this,n)};c("onChange",!0===o,l),c("onKeyPress",!0===o,l),c("onComplete",r.length===n.length,l),c("onInvalid",0<s.invalid.length,[r,e,t,s.invalid,a])}};o.mask=n,o.options=a,o.remove=function(){var e=s.getCaret();return s.destroyEvents(),s.val(o.getCleanVal()),s.setCaret(e-s.getMCharsBeforeCount(e)),t},o.getCleanVal=function(){return s.getMasked(!0)},o.init=function(n){n=n||!1,a=a||{},o.byPassKeys=e.jMaskGlobals.byPassKeys,o.translation=e.jMaskGlobals.translation,o.translation=e.extend({},o.translation,a.translation),o=e.extend(!0,{},o,a),r=s.getRegexMask(),!1===n?(a.placeholder&&t.attr("placeholder",a.placeholder),t.attr("autocomplete","off"),s.destroyEvents(),s.events(),n=s.getCaret(),s.val(s.getMasked()),s.setCaret(n+s.getMCharsBeforeCount(n,!0))):(s.events(),s.val(s.getMasked()))},o.init(!t.is("input"))};e.maskWatchers={};var n=function(){var n=e(this),r={},o=n.attr("data-mask");if(n.attr("data-mask-reverse")&&(r.reverse=!0),n.attr("data-mask-clearifnotmatch")&&(r.clearIfNotMatch=!0),"true"===n.attr("data-mask-selectonfocus")&&(r.selectOnFocus=!0),a(n,o,r))return n.data("mask",new t(this,o,r))},a=function(t,n,a){a=a||{};var r=e(t).data("mask"),o=JSON.stringify;t=e(t).val()||e(t).text();try{return"function"==typeof n&&(n=n(t)),"object"!=typeof r||o(r.options)!==o(a)||r.mask!==n}catch(i){}};e.fn.mask=function(n,r){r=r||{};var o=this.selector,i=e.jMaskGlobals,s=e.jMaskGlobals.watchInterval,l=function(){if(a(this,n,r))return e(this).data("mask",new t(this,n,r))};return e(this).each(l),o&&""!==o&&i.watchInputs&&(clearInterval(e.maskWatchers[o]),e.maskWatchers[o]=setInterval(function(){e(document).find(o).each(l)},s)),this},e.fn.unmask=function(){return clearInterval(e.maskWatchers[this.selector]),delete e.maskWatchers[this.selector],this.each(function(){var t=e(this).data("mask");t&&t.remove().removeData("mask")})},e.fn.cleanVal=function(){return this.data("mask").getCleanVal()},e.applyDataMask=function(t){t=t||e.jMaskGlobals.maskElements,(t instanceof e?t:e(t)).filter(e.jMaskGlobals.dataMaskAttr).each(n)};var r={maskElements:"input,td,span,div",dataMaskAttr:"*[data-mask]",dataMask:!0,watchInterval:300,watchInputs:!0,watchDataMask:!1,byPassKeys:[9,16,17,18,36,37,38,39,40,91],translation:{0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}}};e.jMaskGlobals=e.jMaskGlobals||{},r=e.jMaskGlobals=e.extend(!0,{},r,e.jMaskGlobals),r.dataMask&&e.applyDataMask(),setInterval(function(){e.jMaskGlobals.watchDataMask&&e.applyDataMask()},r.watchInterval)}),$(document).ready(function(){function e(){setTimeout(function(){if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){var e=document.documentElement.clientWidth<window.screen.width?jQuery(window).width():window.screen.width,t=1200,n=e/t;n<1?jQuery("meta[name='viewport']").attr("content","initial-scale="+n+", maximum-scale="+n+", minimum-scale="+n+", user-scalable=yes, width="+t):jQuery("meta[name='viewport']").attr("content","initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width="+e)}},600)}$("input[name=phone]").mask("0 (000) 000-00-00"),$("input[name=email]").mask("A",{translation:{A:{pattern:/[\w@\-.+]/,recursive:!0}}}),jQuery(document).ready(function(){e()}),window.addEventListener("orientationchange",e,!1);var t=$(".home-second--title").width(),n=t/2+"px";$("<style>.arrow-top::after,.home-second .arrow-top::after{border-left-width:"+n+";border-right-width:"+n+";margin-left:-"+n+";}</style>").appendTo("header"),$(".modal-c").click(function(e){e.stopPropagation()}),$(".modalbg").on("click",function(e){event.stopPropagation(),$(".modalbg").fadeOut("fast")}),$("span.close").on("click",function(e){$(".modalbg").fadeOut("fast")}),
	
	$(".ancient-offer .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".ancient-fourth .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".ancient-nine .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".weoffer .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".home-third .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".design--item .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".az-btn1").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".az-btn2").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".az-btn3").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".az-btn4").on("click",function(e){
		e.preventDefault(),
		$(".modalbg-manager").css("display","flex")
	}),
	$(".design-second .btn-red").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".design-third .btn-red").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".design-fourth .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".design-five .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".home-eight .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-offer").css("display","flex")
	}),
	$(".ancient-six .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-sms").css("display","flex")
	}),
	$(".home-five .btn").on("click",function(e){
		e.preventDefault(),
		$(".modal-ancient-sms").css("display","flex")
	}),

	$(".red-form, .form-container form, .modal-c form").on("submit",function(e){e.preventDefault(),$(this).addClass("current-form");var t=$(this),n=$.trim($(".current-form input[name=phone]").val()),a=$.trim($(".current-form input[name=email]").val()),r=$(".current-form input[name=phone]"),o=($(".current-form input[name=email]"),$(this).serializeArray());null!=n&&0==n.length?(alert("Укажите телефон"),$(r).addClass("input-error"),event.preventDefault()):null!=a&&0==a.length?(alert("Укажите почту"),$(r).addClass("input-error"),event.preventDefault()):($(r).removeClass("input-error"),$.ajax({url:"/handler.php",type:"POST",data:o,beforeSend:function(){console.log("Отправляем...")},success:function(e){console.log("Ho o o oray, it worked!"),t.parent("").children("h5").fadeOut("fast"),t.parent("").children("h6").fadeOut("fast"),t.children("input").fadeOut("fast"),t.children("button").fadeOut("fast"),t.parent("").find(".form-sended").fadeIn("fast")}})),$(this).removeClass("current-form")})});
//# sourceMappingURL=maps/scripts.js.map
