!function(t,n,e){var i=window.matchMedia;"undefined"!=typeof module&&module.exports?module.exports=e(i):"function"==typeof define&&define.amd?define(function(){return n[t]=e(i)}):n[t]=e(i)}("enquire",this,function(t){"use strict";function n(t,n){var e,i=0,s=t.length;for(i;s>i&&(e=n(t[i],i),e!==!1);i++);}function e(t){return"[object Array]"===Object.prototype.toString.apply(t)}function i(t){return"function"==typeof t}function s(t){this.options=t,!t.deferSetup&&this.setup()}function o(n,e){this.query=n,this.isUnconditional=e,this.handlers=[],this.mql=t(n);var i=this;this.listener=function(t){i.mql=t,i.assess()},this.mql.addListener(this.listener)}function r(){if(!t)throw new Error("matchMedia not present, legacy browsers require a polyfill");this.queries={},this.browserIsIncapable=!t("only all").matches}return s.prototype={setup:function(){this.options.setup&&this.options.setup(),this.initialised=!0},on:function(){!this.initialised&&this.setup(),this.options.match&&this.options.match()},off:function(){this.options.unmatch&&this.options.unmatch()},destroy:function(){this.options.destroy?this.options.destroy():this.off()},equals:function(t){return this.options===t||this.options.match===t}},o.prototype={addHandler:function(t){var n=new s(t);this.handlers.push(n),this.matches()&&n.on()},removeHandler:function(t){var e=this.handlers;n(e,function(n,i){return n.equals(t)?(n.destroy(),!e.splice(i,1)):void 0})},matches:function(){return this.mql.matches||this.isUnconditional},clear:function(){n(this.handlers,function(t){t.destroy()}),this.mql.removeListener(this.listener),this.handlers.length=0},assess:function(){var t=this.matches()?"on":"off";n(this.handlers,function(n){n[t]()})}},r.prototype={register:function(t,s,r){var u=this.queries,h=r&&this.browserIsIncapable;return u[t]||(u[t]=new o(t,h)),i(s)&&(s={match:s}),e(s)||(s=[s]),n(s,function(n){i(n)&&(n={match:n}),u[t].addHandler(n)}),this},unregister:function(t,n){var e=this.queries[t];return e&&(n?e.removeHandler(n):(e.clear(),delete this.queries[t])),this}},new r}),jQuery(document).ready(function($){enquire.register("screen and (min-width:768px)",{match:function(){$("#menu .menu li ul").hide().removeClass("fallback"),$("#menu .menu li").hover(function(){$("ul",this).stop().slideDown(100)},function(){$("ul",this).stop().slideUp(100)})},unmatch:function(){}})});