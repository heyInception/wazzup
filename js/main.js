/*! For license information please see main.js.LICENSE.txt */
(()=>{var e={755:()=>{jQuery(document).ready((function(e){let t=!1,n=!1;e(document).scroll((function(){e("html").scrollTop()>1e3?t||(e("#wz-to-top").addClass("wz-to-top--visible"),t=!0,n=!1):n||(e("#wz-to-top").removeClass("wz-to-top--visible"),t=!1,n=!0)})),e("#wz-to-top").click((function(){e("html").animate({scrollTop:0},800)}))}))},598:()=>{function e(e){var t=!0,n=!1,o=null,i={text:!0,search:!0,url:!0,tel:!0,email:!0,password:!0,number:!0,date:!0,month:!0,week:!0,time:!0,datetime:!0,"datetime-local":!0};function a(e){return!!(e&&e!==document&&"HTML"!==e.nodeName&&"BODY"!==e.nodeName&&"classList"in e&&"contains"in e.classList)}function r(e){e.classList.contains("focus-visible")||(e.classList.add("focus-visible"),e.setAttribute("data-focus-visible-added",""))}function s(e){t=!1}function c(){document.addEventListener("mousemove",u),document.addEventListener("mousedown",u),document.addEventListener("mouseup",u),document.addEventListener("pointermove",u),document.addEventListener("pointerdown",u),document.addEventListener("pointerup",u),document.addEventListener("touchmove",u),document.addEventListener("touchstart",u),document.addEventListener("touchend",u)}function u(e){e.target.nodeName&&"html"===e.target.nodeName.toLowerCase()||(t=!1,document.removeEventListener("mousemove",u),document.removeEventListener("mousedown",u),document.removeEventListener("mouseup",u),document.removeEventListener("pointermove",u),document.removeEventListener("pointerdown",u),document.removeEventListener("pointerup",u),document.removeEventListener("touchmove",u),document.removeEventListener("touchstart",u),document.removeEventListener("touchend",u))}document.addEventListener("keydown",(function(n){n.metaKey||n.altKey||n.ctrlKey||(a(e.activeElement)&&r(e.activeElement),t=!0)}),!0),document.addEventListener("mousedown",s,!0),document.addEventListener("pointerdown",s,!0),document.addEventListener("touchstart",s,!0),document.addEventListener("visibilitychange",(function(e){"hidden"===document.visibilityState&&(n&&(t=!0),c())}),!0),c(),e.addEventListener("focus",(function(e){var n,o,s;a(e.target)&&(t||(o=(n=e.target).type,"INPUT"===(s=n.tagName)&&i[o]&&!n.readOnly||"TEXTAREA"===s&&!n.readOnly||n.isContentEditable))&&r(e.target)}),!0),e.addEventListener("blur",(function(e){var t;a(e.target)&&(e.target.classList.contains("focus-visible")||e.target.hasAttribute("data-focus-visible-added"))&&(n=!0,window.clearTimeout(o),o=window.setTimeout((function(){n=!1}),100),(t=e.target).hasAttribute("data-focus-visible-added")&&(t.classList.remove("focus-visible"),t.removeAttribute("data-focus-visible-added")))}),!0),e.nodeType===Node.DOCUMENT_FRAGMENT_NODE&&e.host?e.host.setAttribute("data-js-focus-visible",""):e.nodeType===Node.DOCUMENT_NODE&&(document.documentElement.classList.add("js-focus-visible"),document.documentElement.setAttribute("data-js-focus-visible",""))}if("undefined"!=typeof window&&"undefined"!=typeof document){var t;window.applyFocusVisiblePolyfill=e;try{t=new CustomEvent("focus-visible-polyfill-ready")}catch(e){(t=document.createEvent("CustomEvent")).initCustomEvent("focus-visible-polyfill-ready",!1,!1,{})}window.dispatchEvent(t)}"undefined"!=typeof document&&e(document)},2:function(e,t,n){var o,i;window.Element&&!Element.prototype.closest&&(Element.prototype.closest=function(e){var t,n=(this.document||this.ownerDocument).querySelectorAll(e),o=this;do{for(t=n.length;0<=--t&&n.item(t)!==o;);}while(t<0&&(o=o.parentElement));return o}),function(){function e(e,t){t=t||{bubbles:!1,cancelable:!1,detail:void 0};var n=document.createEvent("CustomEvent");return n.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),n}"function"!=typeof window.CustomEvent&&(e.prototype=window.Event.prototype,window.CustomEvent=e)}(),function(){for(var e=0,t=["ms","moz","webkit","o"],n=0;n<t.length&&!window.requestAnimationFrame;++n)window.requestAnimationFrame=window[t[n]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[t[n]+"CancelAnimationFrame"]||window[t[n]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(t,n){var o=(new Date).getTime(),i=Math.max(0,16-(o-e)),a=window.setTimeout((function(){t(o+i)}),i);return e=o+i,a}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(e){clearTimeout(e)})}(),i=void 0!==n.g?n.g:"undefined"!=typeof window?window:this,o=function(){return function(e){"use strict";var t={ignore:"[data-scroll-ignore]",header:null,topOnEmptyHash:!0,speed:500,speedAsDuration:!1,durationMax:null,durationMin:null,clip:!0,offset:0,easing:"easeInOutCubic",customEasing:null,updateURL:!0,popstate:!0,emitEvents:!0},n=function(){var e={};return Array.prototype.forEach.call(arguments,(function(t){for(var n in t){if(!t.hasOwnProperty(n))return;e[n]=t[n]}})),e},o=function(e){"#"===e.charAt(0)&&(e=e.substr(1));for(var t,n=String(e),o=n.length,i=-1,a="",r=n.charCodeAt(0);++i<o;){if(0===(t=n.charCodeAt(i)))throw new InvalidCharacterError("Invalid character: the input contains U+0000.");a+=1<=t&&t<=31||127==t||0===i&&48<=t&&t<=57||1===i&&48<=t&&t<=57&&45===r?"\\"+t.toString(16)+" ":128<=t||45===t||95===t||48<=t&&t<=57||65<=t&&t<=90||97<=t&&t<=122?n.charAt(i):"\\"+n.charAt(i)}return"#"+a},i=function(){return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight,document.documentElement.offsetHeight,document.body.clientHeight,document.documentElement.clientHeight)},a=function(t,n,o){0===t&&document.body.focus(),o||(t.focus(),document.activeElement!==t&&(t.setAttribute("tabindex","-1"),t.focus(),t.style.outline="none"),e.scrollTo(0,n))},r=function(t,n,o,i){if(n.emitEvents&&"function"==typeof e.CustomEvent){var a=new CustomEvent(t,{bubbles:!0,detail:{anchor:o,toggle:i}});document.dispatchEvent(a)}};return function(s,c){var u,d,l,m,f={cancelScroll:function(e){cancelAnimationFrame(m),m=null,e||r("scrollCancel",u)},animateScroll:function(o,s,c){f.cancelScroll();var d=n(u||t,c||{}),v="[object Number]"===Object.prototype.toString.call(o),p=v||!o.tagName?null:o;if(v||p){var h=e.pageYOffset;d.header&&!l&&(l=document.querySelector(d.header));var y,E,b,w,g,L,A,S,O=function(t){return t?(n=t,parseInt(e.getComputedStyle(n).height,10)+t.offsetTop):0;var n}(l),C=v?o:function(t,n,o,a){var r=0;if(t.offsetParent)for(;r+=t.offsetTop,t=t.offsetParent;);return r=Math.max(r-n-o,0),a&&(r=Math.min(r,i()-e.innerHeight)),r}(p,O,parseInt("function"==typeof d.offset?d.offset(o,s):d.offset,10),d.clip),x=C-h,T=i(),q=0,M=(y=x,b=(E=d).speedAsDuration?E.speed:Math.abs(y/1e3*E.speed),E.durationMax&&b>E.durationMax?E.durationMax:E.durationMin&&b<E.durationMin?E.durationMin:parseInt(b,10)),N=function(t){var n,i,c;w||(w=t),q+=t-w,L=h+x*(i=g=1<(g=0===M?0:q/M)?1:g,"easeInQuad"===(n=d).easing&&(c=i*i),"easeOutQuad"===n.easing&&(c=i*(2-i)),"easeInOutQuad"===n.easing&&(c=i<.5?2*i*i:(4-2*i)*i-1),"easeInCubic"===n.easing&&(c=i*i*i),"easeOutCubic"===n.easing&&(c=--i*i*i+1),"easeInOutCubic"===n.easing&&(c=i<.5?4*i*i*i:(i-1)*(2*i-2)*(2*i-2)+1),"easeInQuart"===n.easing&&(c=i*i*i*i),"easeOutQuart"===n.easing&&(c=1- --i*i*i*i),"easeInOutQuart"===n.easing&&(c=i<.5?8*i*i*i*i:1-8*--i*i*i*i),"easeInQuint"===n.easing&&(c=i*i*i*i*i),"easeOutQuint"===n.easing&&(c=1+--i*i*i*i*i),"easeInOutQuint"===n.easing&&(c=i<.5?16*i*i*i*i*i:1+16*--i*i*i*i*i),n.customEasing&&(c=n.customEasing(i)),c||i),e.scrollTo(0,Math.floor(L)),function(t,n){var i=e.pageYOffset;if(t==n||i==n||(h<n&&e.innerHeight+i)>=T)return f.cancelScroll(!0),a(o,n,v),r("scrollStop",d,o,s),!(m=w=null)}(L,C)||(m=e.requestAnimationFrame(N),w=t)};0===e.pageYOffset&&e.scrollTo(0,0),A=o,S=d,v||history.pushState&&S.updateURL&&history.pushState({smoothScroll:JSON.stringify(S),anchor:A.id},document.title,A===document.documentElement?"#top":"#"+A.id),"matchMedia"in e&&e.matchMedia("(prefers-reduced-motion)").matches?a(o,Math.floor(C),!1):(r("scrollStart",d,o,s),f.cancelScroll(!0),e.requestAnimationFrame(N))}}},v=function(t){if(!t.defaultPrevented&&!(0!==t.button||t.metaKey||t.ctrlKey||t.shiftKey)&&"closest"in t.target&&(d=t.target.closest(s))&&"a"===d.tagName.toLowerCase()&&!t.target.closest(u.ignore)&&d.hostname===e.location.hostname&&d.pathname===e.location.pathname&&/#/.test(d.href)){var n,i;try{n=o(decodeURIComponent(d.hash))}catch(t){n=o(d.hash)}if("#"===n){if(!u.topOnEmptyHash)return;i=document.documentElement}else i=document.querySelector(n);(i=i||"#top"!==n?i:document.documentElement)&&(t.preventDefault(),function(t){if(history.replaceState&&t.updateURL&&!history.state){var n=e.location.hash;n=n||"",history.replaceState({smoothScroll:JSON.stringify(t),anchor:n||e.pageYOffset},document.title,n||e.location.href)}}(u),f.animateScroll(i,d))}},p=function(e){if(null!==history.state&&history.state.smoothScroll&&history.state.smoothScroll===JSON.stringify(u)){var t=history.state.anchor;"string"==typeof t&&t&&!(t=document.querySelector(o(history.state.anchor)))||f.animateScroll(t,null,{updateURL:!1})}};return f.destroy=function(){u&&(document.removeEventListener("click",v,!1),e.removeEventListener("popstate",p,!1),f.cancelScroll(),m=l=d=u=null)},function(){if(!("querySelector"in document&&"addEventListener"in e&&"requestAnimationFrame"in e&&"closest"in e.Element.prototype))throw"Smooth Scroll: This browser does not support the required JavaScript methods and browser APIs.";f.destroy(),u=n(t,c||{}),l=u.header?document.querySelector(u.header):null,document.addEventListener("click",v,!1),u.updateURL&&u.popstate&&e.addEventListener("popstate",p,!1)}(),f}}(i)}.apply(t,[]),void 0===o||(e.exports=o)}},t={};function n(o){var i=t[o];if(void 0!==i)return i.exports;var a=t[o]={exports:{}};return e[o].call(a.exports,a,a.exports,n),a.exports}n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";n(598);const e={windowEl:window,documentEl:document,htmlEl:document.documentElement,bodyEl:document.body},t=()=>{const t=document?.querySelectorAll(".fixed-block"),n=(document.body,parseInt(e.bodyEl.dataset.position,10));t.forEach((e=>{e.style.paddingRight="0px"})),e.bodyEl.style.paddingRight="0px",e.bodyEl.style.top="auto",e.bodyEl.classList.remove("dis-scroll"),window.scroll({top:n,left:0}),e.bodyEl.removeAttribute("data-position"),e.htmlEl.style.scrollBehavior="smooth"};!function(){const n=document?.querySelector("[data-burger]"),o=document?.querySelector("[data-menu]"),i=document?.querySelectorAll("[data-menu-item]"),a=document?.querySelector("[data-menu-overlay]");n?.addEventListener("click",(i=>{n?.classList.toggle("burger--active"),o?.classList.toggle("menu--active"),o?.classList.contains("menu--active")?(n?.setAttribute("aria-expanded","true"),n?.setAttribute("aria-label","Закрыть меню"),(()=>{const t=document?.querySelectorAll(".fixed-block"),n=window.scrollY,o=window.innerWidth-e.bodyEl.offsetWidth+"px";e.htmlEl.style.scrollBehavior="none",t.forEach((e=>{e.style.paddingRight=o})),e.bodyEl.style.paddingRight=o,e.bodyEl.classList.add("dis-scroll"),e.bodyEl.dataset.position=n,e.bodyEl.style.top=`-${n}px`})()):(n?.setAttribute("aria-expanded","false"),n?.setAttribute("aria-label","Открыть меню"),t())})),a?.addEventListener("click",(()=>{n?.setAttribute("aria-expanded","false"),n?.setAttribute("aria-label","Открыть меню"),n.classList.remove("burger--active"),o.classList.remove("menu--active"),t()})),i?.forEach((e=>{e.addEventListener("click",(()=>{n?.setAttribute("aria-expanded","false"),n?.setAttribute("aria-label","Открыть меню"),n.classList.remove("burger--active"),o.classList.remove("menu--active"),t()}))}))}();var o=n(2);new(n.n(o)())('a[href*="#"]'),n(755)})()})();