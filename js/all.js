/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1);var MoveTo=function(){function e(e,t,n,o){return e/=o,e--,-n*(e*e*e*e-1)+t}function t(e,t){var n={};return Object.keys(e).forEach(function(t){n[t]=e[t]}),Object.keys(t).forEach(function(e){n[e]=t[e]}),n}function n(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.options=t(o,n),this.easeFunctions=t({easeOutQuart:e},a)}var o={tolerance:0,duration:800,easing:"easeOutQuart",callback:function(){}};return n.prototype.registerTrigger=function(e,n){var o=this;if(e){var a=e.getAttribute("href")||e.getAttribute("data-target"),i=a&&"#"!==a?document.getElementById(a.substring(1)):document.body,r=t(this.options,function(e,t){var n={};return Object.keys(t).forEach(function(t){var o=e.getAttribute("data-mt-"+function(e){return e.replace(/([A-Z])/g,function(e){return"-"+e.toLowerCase()})}(t));o&&(n[t]=isNaN(o)?o:parseInt(o,10))}),n}(e,this.options));"function"==typeof n&&(r.callback=n);var s=function(e){e.preventDefault(),o.move(i,r)};return e.addEventListener("click",s,!1),function(){return e.removeEventListener("click",s,!1)}}},n.prototype.move=function(e){var n=this,o=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(0===e||e){o=t(this.options,o);var a="number"==typeof e?e:e.getBoundingClientRect().top,i=window.pageYOffset,r=null,s=void 0;a-=o.tolerance;window.requestAnimationFrame(function t(d){var u=window.pageYOffset;r||(r=d-1);var c=d-r;if(s&&(a>0&&s>u||a<0&&s<u))return o.callback(e);s=u;var l=n.easeFunctions[o.easing](c,i,a,o.duration);window.scroll(0,l),c<o.duration?window.requestAnimationFrame(t):(window.scroll(0,a+i),o.callback(e))})}},n.prototype.addEaseFunction=function(e,t){this.easeFunctions[e]=t},n}();"undefined"!=typeof module?module.exports=MoveTo:window.MoveTo=MoveTo,function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define("whatInput",[],t):"object"==typeof exports?exports.whatInput=t():e.whatInput=t()}(this,function(){return function(e){function t(o){if(n[o])return n[o].exports;var a=n[o]={exports:{},id:o,loaded:!1};return e[o].call(a.exports,a,a.exports,t),a.loaded=!0,a.exports}var n={};return t.m=e,t.c=n,t.p="",t(0)}([function(e,t){"use strict";e.exports=function(){var e=document.documentElement,t=null,n="initial",o=n,a=null,i=["input","select","textarea"],r=[],s=[16,17,18,91,93],d={keydown:"keyboard",keyup:"keyboard",mousedown:"mouse",mousemove:"mouse",MSPointerDown:"pointer",MSPointerMove:"pointer",pointerdown:"pointer",pointermove:"pointer",touchstart:"touch"},u=!1,c=!1,l={x:null,y:null},p={2:"touch",3:"touch",4:"mouse"},f=!1;try{var g=Object.defineProperty({},"passive",{get:function(){f=!0}});window.addEventListener("test",null,g)}catch(e){}var h=function(){var e=!!f&&{passive:!0};window.PointerEvent?(window.addEventListener("pointerdown",m),window.addEventListener("pointermove",w)):window.MSPointerEvent?(window.addEventListener("MSPointerDown",m),window.addEventListener("MSPointerMove",w)):(window.addEventListener("mousedown",m),window.addEventListener("mousemove",w),"ontouchstart"in window&&(window.addEventListener("touchstart",x,e),window.addEventListener("touchend",m))),window.addEventListener(N(),w,e),window.addEventListener("keydown",x),window.addEventListener("keyup",x),window.addEventListener("focusin",b),window.addEventListener("focusout",y)},m=function(e){if(!u){var t=e.which,a=d[e.type];"pointer"===a&&(a=E(e));var r="keyboard"===a&&t&&-1===s.indexOf(t)||"mouse"===a||"touch"===a;if(n!==a&&r&&(n=a,v("input")),o!==a&&r){var c=document.activeElement;c&&c.nodeName&&-1===i.indexOf(c.nodeName.toLowerCase())&&(o=a,v("intent"))}}},v=function(t){e.setAttribute("data-what"+t,"input"===t?n:o),L(t)},w=function(e){if(k(e),!u&&!c){var t=d[e.type];"pointer"===t&&(t=E(e)),o!==t&&(o=t,v("intent"))}},b=function(n){n.target.nodeName?(t=n.target.nodeName.toLowerCase(),e.setAttribute("data-whatelement",t),n.target.classList&&n.target.classList.length&&e.setAttribute("data-whatclasses",n.target.classList.toString().replace(" ",","))):y()},y=function(){t=null,e.removeAttribute("data-whatelement"),e.removeAttribute("data-whatclasses")},x=function(e){m(e),window.clearTimeout(a),u=!0,a=window.setTimeout(function(){u=!1},100)},E=function(e){return"number"==typeof e.pointerType?p[e.pointerType]:"pen"===e.pointerType?"touch":e.pointerType},N=function(){return"onwheel"in document.createElement("div")?"wheel":void 0!==document.onmousewheel?"mousewheel":"DOMMouseScroll"},L=function(e){for(var t=0,a=r.length;t<a;t++)r[t].type===e&&r[t].fn.call(void 0,"input"===e?n:o)},k=function(e){l.x!==e.screenX||l.y!==e.screenY?(c=!1,l.x=e.screenX,l.y=e.screenY):c=!0};return"addEventListener"in window&&Array.prototype.indexOf&&(d[N()]="mouse",h(),v("input"),v("intent")),{ask:function(e){return"intent"===e?o:n},element:function(){return t},ignoreKeys:function(e){s=e},registerOnChange:function(e,t){r.push({fn:e,type:t||"input"})},unRegisterOnChange:function(e){var t=function(e){for(var t=0,n=r.length;t<n;t++)if(r[t].fn===e)return t}(e);t&&r.splice(t,1)}}}()}])}),function(e){function t(){d.className=d.className.replace(" disable-scroll",""),u.className=u.className.replace(" js-nav-active",""),c.className=c.className.replace(" is-active",""),l.className=l.className.replace(" is-active",""),l.setAttribute("aria-expanded","false"),p.setAttribute("aria-expanded","false"),l.focus()}function n(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}var o=e(".nav-container"),a=o.find("#nav-toggle"),i=o.find("#main-navigation-wrapper"),r=o.find("#nav"),s=e("<button />",{class:"dropdown-toggle","aria-expanded":!1}).append(e("<span />",{class:"screen-reader-text",text:screenReaderText.expand}));a.length&&(a.add(r).attr("aria-expanded","false"),a.on("click",function(){e(this).add(i).toggleClass("toggled-on"),e(this).add(r).attr("aria-expanded","false"===e(this).add(r).attr("aria-expanded")?"true":"false")})),e(".menu-item-has-children > a").after(s),i.find(".menu-item-has-children").attr("aria-haspopup","true"),i.find(".dropdown-toggle").click(function(t){screenReaderSpan=e(this).find(".screen-reader-text"),dropdownMenu=e(this).nextAll(".sub-menu"),t.preventDefault(),e(this).toggleClass("toggled-on"),dropdownMenu.toggleClass("toggled-on"),e(this).attr("aria-expanded","false"===e(this).attr("aria-expanded")?"true":"false"),screenReaderSpan.text(screenReaderSpan.text()===screenReaderText.expand?screenReaderText.collapse:screenReaderText.expand)}),e(".sub-menu .menu-item-has-children").parent(".sub-menu").addClass("has-sub-menu"),e(".menu-item a, button.dropdown-toggle").on("keydown",function(t){if(-1!=[37,38,39,40].indexOf(t.keyCode))switch(t.keyCode){case 37:t.preventDefault(),t.stopPropagation(),e(this).hasClass("dropdown-toggle")?e(this).prev("a").focus():e(this).parent().prev().children("button.dropdown-toggle").length?e(this).parent().prev().children("button.dropdown-toggle").focus():e(this).parent().prev().children("a").focus(),e(this).is("ul ul ul.sub-menu.toggled-on li:first-child a")&&e(this).parents("ul.sub-menu.toggled-on li").children("button.dropdown-toggle").focus();break;case 39:t.preventDefault(),t.stopPropagation(),e(this).next("button.dropdown-toggle").length?e(this).next("button.dropdown-toggle").focus():e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu .dropdown-toggle.toggled-on")&&e(this).parent().find("ul.sub-menu li:first-child a").focus();break;case 40:t.preventDefault(),t.stopPropagation(),e(this).next().length?e(this).next().find("li:first-child a").first().focus():e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu a")&&e(this).next("button.dropdown-toggle").length&&e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu .dropdown-toggle")&&e(this).parent().next().children(".dropdown-toggle").length&&e(this).parent().next().children(".dropdown-toggle").focus();break;case 38:t.preventDefault(),t.stopPropagation(),e(this).parent().prev().length?e(this).parent().prev().children("a").focus():e(this).parents("ul").first().prev(".dropdown-toggle.toggled-on").focus(),e(this).is("ul.sub-menu .dropdown-toggle")&&e(this).parent().prev().children(".dropdown-toggle").length&&e(this).parent().prev().children(".dropdown-toggle").focus()}});var d,u,c,l,p,f,g,h,m,v,w,b;if((c=document.getElementById("nav"))&&void 0!==(l=document.getElementById("nav-toggle")))if(d=document.getElementsByTagName("html")[0],u=document.getElementsByTagName("body")[0],p=c.getElementsByTagName("ul")[0],f=document.getElementById("main-navigation-wrapper"),void 0!==p){for(p.setAttribute("aria-expanded","false"),-1===p.className.indexOf("nav-menu")&&(p.className+=" nav-menu"),l.onclick=function(){-1!==c.className.indexOf("is-active")?t():(d.className+=" disable-scroll",u.className+=" js-nav-active",c.className+=" is-active",l.className+=" is-active",l.setAttribute("aria-expanded","true"),p.setAttribute("aria-expanded","true"),v=c.querySelectorAll(["a[href]","area[href]","input:not([disabled])","select:not([disabled])","textarea:not([disabled])","button:not([disabled])","iframe","object","embed","[contenteditable]",'[tabindex]:not([tabindex^="-"])']),w=v[0],b=v[v.length-1],console.log(v),b.addEventListener("keydown",function(e){9!==e.keyCode||e.shiftKey||(e.preventDefault(),l.focus())}),w.addEventListener("keydown",function(e){9===e.keyCode&&e.shiftKey&&(e.preventDefault(),l.focus())}),l.addEventListener("keydown",function(e){9===e.keyCode&&e.shiftKey&&(e.preventDefault(),b.focus())}))},document.addEventListener("keyup",function(e){27==e.keyCode&&-1!==c.className.indexOf("is-active")&&t()}),f.onclick=function(e){e.target==f&&-1!==c.className.indexOf("is-active")&&t()},g=p.getElementsByTagName("a"),p.getElementsByTagName("ul"),h=0,m=g.length;h<m;h++)g[h].addEventListener("focus",n,!0),g[h].addEventListener("blur",n,!0);!function(e){var t,n,o=c.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");if("ontouchstart"in window)for(t=function(e){var t,n=this.parentNode;if(n.classList.contains("focus"))n.classList.remove("focus");else{for(e.preventDefault(),t=0;t<n.parentNode.children.length;++t)n!==n.parentNode.children[t]&&n.parentNode.children[t].classList.remove("focus");n.classList.add("focus")}},n=0;n<o.length;++n)o[n].addEventListener("touchstart",t,!1)}()}else l.style.display="none"}(jQuery),function(e){e(window).scroll(function(){e(this).scrollTop()>300?e(".top").addClass("is-visible"):e(".top").removeClass("is-visible"),e(this).scrollTop()>1200?e(".top").addClass("fade-out"):e(".top").removeClass("fade-out")}),e(function(){var e=new MoveTo,t=document.getElementById("target");e.move(t);var n=document.getElementsByClassName("js-trigger")[0];e.registerTrigger(n)})}(jQuery);