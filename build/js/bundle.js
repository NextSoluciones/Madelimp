!function e(t,n,o){function r(i,s){if(!n[i]){if(!t[i]){var l="function"==typeof require&&require;if(!s&&l)return l(i,!0);if(a)return a(i,!0);var c=new Error("Cannot find module '"+i+"'");throw c.code="MODULE_NOT_FOUND",c}var u=n[i]={exports:{}};t[i][0].call(u.exports,function(e){var n=t[i][1][e];return r(n?n:e)},u,u.exports,e,t,n,o)}return n[i].exports}for(var a="function"==typeof require&&require,i=0;i<o.length;i++)r(o[i]);return r}({1:[function(e,t,n){!function(e,o){"function"==typeof define&&define.amd?define(function(){return o(e)}):"object"==typeof n?t.exports=o:e.echo=o(e)}(this,function(e){"use strict";var t,n,o,r,a,i={},s=function(){},l=function(e){return null===e.offsetParent},c=function(e,t){if(l(e))return!1;var n=e.getBoundingClientRect();return n.right>=t.l&&n.bottom>=t.t&&n.left<=t.r&&n.top<=t.b},u=function(){(r||!n)&&(clearTimeout(n),n=setTimeout(function(){i.render(),n=null},o))};return i.init=function(n){n=n||{};var l=n.offset||0,c=n.offsetVertical||l,d=n.offsetHorizontal||l,f=function(e,t){return parseInt(e||t,10)};t={t:f(n.offsetTop,c),b:f(n.offsetBottom,c),l:f(n.offsetLeft,d),r:f(n.offsetRight,d)},o=f(n.throttle,250),r=n.debounce!==!1,a=!!n.unload,s=n.callback||s,i.render(),document.addEventListener?(e.addEventListener("scroll",u,!1),e.addEventListener("load",u,!1)):(e.attachEvent("onscroll",u),e.attachEvent("onload",u))},i.render=function(){for(var n,o,r=document.querySelectorAll("img[data-echo], [data-echo-background]"),l=r.length,u={l:0-t.l,t:0-t.t,b:(e.innerHeight||document.documentElement.clientHeight)+t.b,r:(e.innerWidth||document.documentElement.clientWidth)+t.r},d=0;l>d;d++)o=r[d],c(o,u)?(a&&o.setAttribute("data-echo-placeholder",o.src),null!==o.getAttribute("data-echo-background")?o.style.backgroundImage="url("+o.getAttribute("data-echo-background")+")":o.src=o.getAttribute("data-echo"),a||(o.removeAttribute("data-echo"),o.removeAttribute("data-echo-background")),s(o,"load")):a&&(n=o.getAttribute("data-echo-placeholder"))&&(null!==o.getAttribute("data-echo-background")?o.style.backgroundImage="url("+n+")":o.src=n,o.removeAttribute("data-echo-placeholder"),s(o,"unload"));l||i.detach()},i.detach=function(){document.removeEventListener?e.removeEventListener("scroll",u):e.detachEvent("onscroll",u),clearTimeout(n)},i})},{}],2:[function(e,t,n){!function(e,n){var o=n(e,e.document);e.lazySizes=o,"object"==typeof t&&t.exports&&(t.exports=o)}(window,function(e,t){"use strict";if(t.getElementsByClassName){var n,o=t.documentElement,r=e.HTMLPictureElement&&"sizes"in t.createElement("img"),a="addEventListener",i="getAttribute",s=e[a],l=e.setTimeout,c=e.requestAnimationFrame||l,u=/^picture$/i,d=["load","error","lazyincluded","_lazyloaded"],f={},m=Array.prototype.forEach,g=function(e,t){return f[t]||(f[t]=new RegExp("(\\s|^)"+t+"(\\s|$)")),f[t].test(e[i]("class")||"")&&f[t]},h=function(e,t){g(e,t)||e.setAttribute("class",(e[i]("class")||"").trim()+" "+t)},v=function(e,t){var n;(n=g(e,t))&&e.setAttribute("class",(e[i]("class")||"").replace(n," "))},p=function(e,t,n){var o=n?a:"removeEventListener";n&&p(e,t),d.forEach(function(n){e[o](n,t)})},b=function(e,n,o,r,a){var i=t.createEvent("CustomEvent");return i.initCustomEvent(n,!r,!a,o||{}),e.dispatchEvent(i),i},y=function(t,o){var a;!r&&(a=e.picturefill||n.pf)?a({reevaluate:!0,elements:[t]}):o&&o.src&&(t.src=o.src)},z=function(e,t){return(getComputedStyle(e,null)||{})[t]},E=function(e,t,o){for(o=o||e.offsetWidth;o<n.minSize&&t&&!e._lazysizesWidth;)o=t.offsetWidth,t=t.parentNode;return o},C=function(t){var n,o=0,r=e.Date,a=function(){n=!1,o=r.now(),t()},i=function(){l(a)},s=function(){c(i)};return function(){if(!n){var e=125-(r.now()-o);n=!0,6>e&&(e=6),l(s,e)}}},A=function(){var r,d,f,E,A,B,M,L,N,x,I,H,_,k,W,T=/^img$/i,S=/^iframe$/i,R="onscroll"in e&&!/glebot/.test(navigator.userAgent),j=0,D=0,O=0,P=0,q=function(e){O--,e&&e.target&&p(e.target,q),(!e||0>O||!e.target)&&(O=0)},F=function(e,n){var r,a=e,i="hidden"==z(t.body,"visibility")||"hidden"!=z(e,"visibility");for(N-=n,H+=n,x-=n,I+=n;i&&(a=a.offsetParent)&&a!=t.body&&a!=o;)i=(z(a,"opacity")||1)>0,i&&"visible"!=z(a,"overflow")&&(r=a.getBoundingClientRect(),i=I>r.left&&x<r.right&&H>r.top-1&&N<r.bottom+1);return i},$=function(){var e,t,a,s,l,c,u,m,g;if((A=n.loadMode)&&8>O&&(e=r.length)){t=0,P++,null==k&&("expand"in n||(n.expand=o.clientHeight>600?o.clientWidth>600?550:410:359),_=n.expand,k=_*n.expFactor),k>D&&1>O&&P>3&&A>2?(D=k,P=0):D=A>1&&P>2&&6>O?_:j;for(;e>t;t++)if(r[t]&&!r[t]._lazyRace)if(R)if((m=r[t][i]("data-expand"))&&(c=1*m)||(c=D),g!==c&&(M=innerWidth+c*W,L=innerHeight+c,u=-1*c,g=c),a=r[t].getBoundingClientRect(),(H=a.bottom)>=u&&(N=a.top)<=L&&(I=a.right)>=u*W&&(x=a.left)<=M&&(H||I||x||N)&&(f&&3>O&&!m&&(3>A||4>P)||F(r[t],c))){if(X(r[t]),l=!0,O>9)break}else!l&&f&&!s&&4>O&&4>P&&A>2&&(d[0]||n.preloadAfterLoad)&&(d[0]||!m&&(H||I||x||N||"auto"!=r[t][i](n.sizesAttr)))&&(s=d[0]||r[t]);else X(r[t]);s&&!l&&X(s)}},U=C($),V=function(e){h(e.target,n.loadedClass),v(e.target,n.loadingClass),p(e.target,G)},G=function(e){e={target:e.target},c(function(){V(e)})},J=function(e,t){try{e.contentWindow.location.replace(t)}catch(n){e.src=t}},K=function(e){var t,o,r=e[i](n.srcsetAttr);(t=n.customMedia[e[i]("data-media")||e[i]("media")])&&e.setAttribute("media",t),r&&e.setAttribute("srcset",r),t&&(o=e.parentNode,o.insertBefore(e.cloneNode(),e),o.removeChild(e))},Q=function(){var e,t=[],n=function(){for(;t.length;)t.shift()();e=!1},o=function(o){t.push(o),e||(e=!0,c(n))};return{add:o,run:n}}(),X=function(e){var t,o,r,a,s,d,z,C=T.test(e.nodeName),A=C&&(e[i](n.sizesAttr)||e[i]("sizes")),B="auto"==A;(!B&&f||!C||!e.src&&!e.srcset||e.complete||g(e,n.errorClass))&&(B&&(z=e.offsetWidth),e._lazyRace=!0,O++,n.rC&&(z=n.rC(e,z)||z),Q.add(function(){(s=b(e,"lazybeforeunveil")).defaultPrevented||(A&&(B?(w.updateElem(e,!0,z),h(e,n.autosizesClass)):e.setAttribute("sizes",A)),o=e[i](n.srcsetAttr),t=e[i](n.srcAttr),C&&(r=e.parentNode,a=r&&u.test(r.nodeName||"")),d=s.detail.firesLoad||"src"in e&&(o||t||a),s={target:e},d&&(p(e,q,!0),clearTimeout(E),E=l(q,2500),h(e,n.loadingClass),p(e,G,!0)),a&&m.call(r.getElementsByTagName("source"),K),o?e.setAttribute("srcset",o):t&&!a&&(S.test(e.nodeName)?J(e,t):e.src=t),(o||a)&&y(e,{src:t})),c(function(){e._lazyRace&&delete e._lazyRace,v(e,n.lazyClass),(!d||e.complete)&&(d?q(s):O--,V(s))})}))},Y=function(){if(!f){if(Date.now()-B<999)return void l(Y,999);var e,o=function(){n.loadMode=3,U()};f=!0,n.loadMode=3,t.hidden?($(),Q.run()):U(),s("scroll",function(){3==n.loadMode&&(n.loadMode=2),clearTimeout(e),e=l(o,99)},!0)}};return{_:function(){B=Date.now(),r=t.getElementsByClassName(n.lazyClass),d=t.getElementsByClassName(n.lazyClass+" "+n.preloadClass),W=n.hFac,s("scroll",U,!0),s("resize",U,!0),e.MutationObserver?new MutationObserver(U).observe(o,{childList:!0,subtree:!0,attributes:!0}):(o[a]("DOMNodeInserted",U,!0),o[a]("DOMAttrModified",U,!0),setInterval(U,999)),s("hashchange",U,!0),["focus","mouseover","click","load","transitionend","animationend","webkitAnimationEnd"].forEach(function(e){t[a](e,U,!0)}),/d$|^c/.test(t.readyState)?Y():(s("load",Y),t[a]("DOMContentLoaded",U),l(Y,2e4)),U(r.length>0)},checkElems:U,unveil:X}}(),w=function(){var e,o=function(e,t,n){var o,r,a,i,s=e.parentNode;if(s&&(n=E(e,s,n),i=b(e,"lazybeforesizes",{width:n,dataAttr:!!t}),!i.defaultPrevented&&(n=i.detail.width,n&&n!==e._lazysizesWidth))){if(e._lazysizesWidth=n,n+="px",e.setAttribute("sizes",n),u.test(s.nodeName||""))for(o=s.getElementsByTagName("source"),r=0,a=o.length;a>r;r++)o[r].setAttribute("sizes",n);i.detail.dataAttr||y(e,i.detail)}},r=function(){var t,n=e.length;if(n)for(t=0;n>t;t++)o(e[t])},a=C(r);return{_:function(){e=t.getElementsByClassName(n.autosizesClass),s("resize",a)},checkElems:a,updateElem:o}}(),B=function(){B.i||(B.i=!0,w._(),A._())};return function(){var t,o={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:!0,expFactor:1.7,hFac:.8,loadMode:2};n=e.lazySizesConfig||e.lazysizesConfig||{};for(t in o)t in n||(n[t]=o[t]);e.lazySizesConfig=n,l(function(){n.init&&B()})}(),{cfg:n,autoSizer:w,loader:A,init:B,uP:y,aC:h,rC:v,hC:g,fire:b,gW:E}}})},{}],3:[function(e,t,n){t.exports={menuNavegador:function(){var e=document.getElementById("barraNav"),t=document.getElementById("btnMenu"),n=document.getElementById("btnMenui1"),o=document.getElementById("btnMenui2"),r=document.getElementById("btnMenui3"),a=(new Hammer(e),new Hammer(t));new Hammer(n),new Hammer(o),new Hammer(r);a.on("tap",function(t){console.log(t),e.classList.toggle("open")})},sideBarMenu:function(){var e=document.getElementById("sideMenu"),t=document.getElementById("categoriasSide"),n=document.getElementById("btnProductosMenu"),o=document.getElementById("lisCat"),r=(new Hammer(e),new Hammer(t)),a=(new Hammer(o),new Hammer(n));a.on("tap",function(n){console.log(n),t.classList.toggle("open"),e.classList.toggle("open")}),a.on("swiperight",function(n){console.log(n),t.classList.toggle("open"),e.classList.toggle("open")}),r.on("swipeleft",function(n){console.log(n),t.classList.toggle("open"),e.classList.toggle("open")})},buscar:function(){function e(){var e="funcion buscar disparada";alert(e)}var t=document.getElementById("buscar"),n=document.getElementById("buscador-input"),o=new Hammer(t),r=document.getElementById("header"),a=window.matchMedia("(max-width: 480px)");o.on("tap",function(o){if(console.log(o),a.matches){n.classList.toggle("mostrar"),r.classList.toggle("solapar"),t.classList.toggle("enfasis");var i=t.getAttribute("class");"circulo"==i&&e()}else e()})}}},{}],4:[function(e,t,n){var o=(e("./lib/echo.min.js"),e("./lib/lazysizes.min.js"),e("./lib/responsive.js"));o.menuNavegador(),o.sideBarMenu(),o.buscar()},{"./lib/echo.min.js":1,"./lib/lazysizes.min.js":2,"./lib/responsive.js":3}]},{},[4]);