	(function(t){"use strict";var e=t.GreenSockGlobals||t;if(!e.TweenLite){var i,s,n,r,a,o=function(t){var i,s=t.split("."),n=e;for(i=0;s.length>i;i++)n[s[i]]=n=n[s[i]]||{};return n},l=o("com.greensock"),h=1e-10,_=[].slice,u=function(){},m=function(){var t=Object.prototype.toString,e=t.call([]);return function(i){return null!=i&&(i instanceof Array||"object"==typeof i&&!!i.push&&t.call(i)===e)}}(),f={},p=function(i,s,n,r){this.sc=f[i]?f[i].sc:[],f[i]=this,this.gsClass=null,this.func=n;var a=[];this.check=function(l){for(var h,_,u,m,c=s.length,d=c;--c>-1;)(h=f[s[c]]||new p(s[c],[])).gsClass?(a[c]=h.gsClass,d--):l&&h.sc.push(this);if(0===d&&n)for(_=("com.greensock."+i).split("."),u=_.pop(),m=o(_.join("."))[u]=this.gsClass=n.apply(n,a),r&&(e[u]=m,"function"==typeof define&&define.amd?define((t.GreenSockAMDPath?t.GreenSockAMDPath+"/":"")+i.split(".").join("/"),[],function(){return m}):"undefined"!=typeof module&&module.exports&&(module.exports=m)),c=0;this.sc.length>c;c++)this.sc[c].check()},this.check(!0)},c=t._gsDefine=function(t,e,i,s){return new p(t,e,i,s)},d=l._class=function(t,e,i){return e=e||function(){},c(t,[],function(){return e},i),e};c.globals=e;var v=[0,0,1,1],g=[],T=d("easing.Ease",function(t,e,i,s){this._func=t,this._type=i||0,this._power=s||0,this._params=e?v.concat(e):v},!0),y=T.map={},w=T.register=function(t,e,i,s){for(var n,r,a,o,h=e.split(","),_=h.length,u=(i||"easeIn,easeOut,easeInOut").split(",");--_>-1;)for(r=h[_],n=s?d("easing."+r,null,!0):l.easing[r]||{},a=u.length;--a>-1;)o=u[a],y[r+"."+o]=y[o+r]=n[o]=t.getRatio?t:t[o]||new t};for(n=T.prototype,n._calcEnd=!1,n.getRatio=function(t){if(this._func)return this._params[0]=t,this._func.apply(null,this._params);var e=this._type,i=this._power,s=1===e?1-t:2===e?t:.5>t?2*t:2*(1-t);return 1===i?s*=s:2===i?s*=s*s:3===i?s*=s*s*s:4===i&&(s*=s*s*s*s),1===e?1-s:2===e?s:.5>t?s/2:1-s/2},i=["Linear","Quad","Cubic","Quart","Quint,Strong"],s=i.length;--s>-1;)n=i[s]+",Power"+s,w(new T(null,null,1,s),n,"easeOut",!0),w(new T(null,null,2,s),n,"easeIn"+(0===s?",easeNone":"")),w(new T(null,null,3,s),n,"easeInOut");y.linear=l.easing.Linear.easeIn,y.swing=l.easing.Quad.easeInOut;var P=d("events.EventDispatcher",function(t){this._listeners={},this._eventTarget=t||this});n=P.prototype,n.addEventListener=function(t,e,i,s,n){n=n||0;var o,l,h=this._listeners[t],_=0;for(null==h&&(this._listeners[t]=h=[]),l=h.length;--l>-1;)o=h[l],o.c===e&&o.s===i?h.splice(l,1):0===_&&n>o.pr&&(_=l+1);h.splice(_,0,{c:e,s:i,up:s,pr:n}),this!==r||a||r.wake()},n.removeEventListener=function(t,e){var i,s=this._listeners[t];if(s)for(i=s.length;--i>-1;)if(s[i].c===e)return s.splice(i,1),void 0},n.dispatchEvent=function(t){var e,i,s,n=this._listeners[t];if(n)for(e=n.length,i=this._eventTarget;--e>-1;)s=n[e],s.up?s.c.call(s.s||i,{type:t,target:i}):s.c.call(s.s||i)};var k=t.requestAnimationFrame,b=t.cancelAnimationFrame,A=Date.now||function(){return(new Date).getTime()},S=A();for(i=["ms","moz","webkit","o"],s=i.length;--s>-1&&!k;)k=t[i[s]+"RequestAnimationFrame"],b=t[i[s]+"CancelAnimationFrame"]||t[i[s]+"CancelRequestAnimationFrame"];d("Ticker",function(t,e){var i,s,n,o,l,_=this,m=A(),f=e!==!1&&k,p=500,c=33,d=function(t){var e,r,a=A()-S;a>p&&(m+=a-c),S+=a,_.time=(S-m)/1e3,e=_.time-l,(!i||e>0||t===!0)&&(_.frame++,l+=e+(e>=o?.004:o-e),r=!0),t!==!0&&(n=s(d)),r&&_.dispatchEvent("tick")};P.call(_),_.time=_.frame=0,_.tick=function(){d(!0)},_.lagSmoothing=function(t,e){p=t||1/h,c=Math.min(e,p,0)},_.sleep=function(){null!=n&&(f&&b?b(n):clearTimeout(n),s=u,n=null,_===r&&(a=!1))},_.wake=function(){null!==n?_.sleep():_.frame>10&&(S=A()-p+5),s=0===i?u:f&&k?k:function(t){return setTimeout(t,0|1e3*(l-_.time)+1)},_===r&&(a=!0),d(2)},_.fps=function(t){return arguments.length?(i=t,o=1/(i||60),l=this.time+o,_.wake(),void 0):i},_.useRAF=function(t){return arguments.length?(_.sleep(),f=t,_.fps(i),void 0):f},_.fps(t),setTimeout(function(){f&&(!n||5>_.frame)&&_.useRAF(!1)},1500)}),n=l.Ticker.prototype=new l.events.EventDispatcher,n.constructor=l.Ticker;var x=d("core.Animation",function(t,e){if(this.vars=e=e||{},this._duration=this._totalDuration=t||0,this._delay=Number(e.delay)||0,this._timeScale=1,this._active=e.immediateRender===!0,this.data=e.data,this._reversed=e.reversed===!0,B){a||r.wake();var i=this.vars.useFrames?Q:B;i.add(this,i._time),this.vars.paused&&this.paused(!0)}});r=x.ticker=new l.Ticker,n=x.prototype,n._dirty=n._gc=n._initted=n._paused=!1,n._totalTime=n._time=0,n._rawPrevTime=-1,n._next=n._last=n._onUpdate=n._timeline=n.timeline=null,n._paused=!1;var C=function(){a&&A()-S>2e3&&r.wake(),setTimeout(C,2e3)};C(),n.play=function(t,e){return null!=t&&this.seek(t,e),this.reversed(!1).paused(!1)},n.pause=function(t,e){return null!=t&&this.seek(t,e),this.paused(!0)},n.resume=function(t,e){return null!=t&&this.seek(t,e),this.paused(!1)},n.seek=function(t,e){return this.totalTime(Number(t),e!==!1)},n.restart=function(t,e){return this.reversed(!1).paused(!1).totalTime(t?-this._delay:0,e!==!1,!0)},n.reverse=function(t,e){return null!=t&&this.seek(t||this.totalDuration(),e),this.reversed(!0).paused(!1)},n.render=function(){},n.invalidate=function(){return this},n.isActive=function(){var t,e=this._timeline,i=this._startTime;return!e||!this._gc&&!this._paused&&e.isActive()&&(t=e.rawTime())>=i&&i+this.totalDuration()/this._timeScale>t},n._enabled=function(t,e){return a||r.wake(),this._gc=!t,this._active=this.isActive(),e!==!0&&(t&&!this.timeline?this._timeline.add(this,this._startTime-this._delay):!t&&this.timeline&&this._timeline._remove(this,!0)),!1},n._kill=function(){return this._enabled(!1,!1)},n.kill=function(t,e){return this._kill(t,e),this},n._uncache=function(t){for(var e=t?this:this.timeline;e;)e._dirty=!0,e=e.timeline;return this},n._swapSelfInParams=function(t){for(var e=t.length,i=t.concat();--e>-1;)"{self}"===t[e]&&(i[e]=this);return i},n.eventCallback=function(t,e,i,s){if("on"===(t||"").substr(0,2)){var n=this.vars;if(1===arguments.length)return n[t];null==e?delete n[t]:(n[t]=e,n[t+"Params"]=m(i)&&-1!==i.join("").indexOf("{self}")?this._swapSelfInParams(i):i,n[t+"Scope"]=s),"onUpdate"===t&&(this._onUpdate=e)}return this},n.delay=function(t){return arguments.length?(this._timeline.smoothChildTiming&&this.startTime(this._startTime+t-this._delay),this._delay=t,this):this._delay},n.duration=function(t){return arguments.length?(this._duration=this._totalDuration=t,this._uncache(!0),this._timeline.smoothChildTiming&&this._time>0&&this._time<this._duration&&0!==t&&this.totalTime(this._totalTime*(t/this._duration),!0),this):(this._dirty=!1,this._duration)},n.totalDuration=function(t){return this._dirty=!1,arguments.length?this.duration(t):this._totalDuration},n.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),this.totalTime(t>this._duration?this._duration:t,e)):this._time},n.totalTime=function(t,e,i){if(a||r.wake(),!arguments.length)return this._totalTime;if(this._timeline){if(0>t&&!i&&(t+=this.totalDuration()),this._timeline.smoothChildTiming){this._dirty&&this.totalDuration();var s=this._totalDuration,n=this._timeline;if(t>s&&!i&&(t=s),this._startTime=(this._paused?this._pauseTime:n._time)-(this._reversed?s-t:t)/this._timeScale,n._dirty||this._uncache(!1),n._timeline)for(;n._timeline;)n._timeline._time!==(n._startTime+n._totalTime)/n._timeScale&&n.totalTime(n._totalTime,!0),n=n._timeline}this._gc&&this._enabled(!0,!1),(this._totalTime!==t||0===this._duration)&&(this.render(t,e,!1),z.length&&q())}return this},n.progress=n.totalProgress=function(t,e){return arguments.length?this.totalTime(this.duration()*t,e):this._time/this.duration()},n.startTime=function(t){return arguments.length?(t!==this._startTime&&(this._startTime=t,this.timeline&&this.timeline._sortChildren&&this.timeline.add(this,t-this._delay)),this):this._startTime},n.timeScale=function(t){if(!arguments.length)return this._timeScale;if(t=t||h,this._timeline&&this._timeline.smoothChildTiming){var e=this._pauseTime,i=e||0===e?e:this._timeline.totalTime();this._startTime=i-(i-this._startTime)*this._timeScale/t}return this._timeScale=t,this._uncache(!1)},n.reversed=function(t){return arguments.length?(t!=this._reversed&&(this._reversed=t,this.totalTime(this._timeline&&!this._timeline.smoothChildTiming?this.totalDuration()-this._totalTime:this._totalTime,!0)),this):this._reversed},n.paused=function(t){if(!arguments.length)return this._paused;if(t!=this._paused&&this._timeline){a||t||r.wake();var e=this._timeline,i=e.rawTime(),s=i-this._pauseTime;!t&&e.smoothChildTiming&&(this._startTime+=s,this._uncache(!1)),this._pauseTime=t?i:null,this._paused=t,this._active=this.isActive(),!t&&0!==s&&this._initted&&this.duration()&&this.render(e.smoothChildTiming?this._totalTime:(i-this._startTime)/this._timeScale,!0,!0)}return this._gc&&!t&&this._enabled(!0,!1),this};var R=d("core.SimpleTimeline",function(t){x.call(this,0,t),this.autoRemoveChildren=this.smoothChildTiming=!0});n=R.prototype=new x,n.constructor=R,n.kill()._gc=!1,n._first=n._last=null,n._sortChildren=!1,n.add=n.insert=function(t,e){var i,s;if(t._startTime=Number(e||0)+t._delay,t._paused&&this!==t._timeline&&(t._pauseTime=t._startTime+(this.rawTime()-t._startTime)/t._timeScale),t.timeline&&t.timeline._remove(t,!0),t.timeline=t._timeline=this,t._gc&&t._enabled(!0,!0),i=this._last,this._sortChildren)for(s=t._startTime;i&&i._startTime>s;)i=i._prev;return i?(t._next=i._next,i._next=t):(t._next=this._first,this._first=t),t._next?t._next._prev=t:this._last=t,t._prev=i,this._timeline&&this._uncache(!0),this},n._remove=function(t,e){return t.timeline===this&&(e||t._enabled(!1,!0),t.timeline=null,t._prev?t._prev._next=t._next:this._first===t&&(this._first=t._next),t._next?t._next._prev=t._prev:this._last===t&&(this._last=t._prev),this._timeline&&this._uncache(!0)),this},n.render=function(t,e,i){var s,n=this._first;for(this._totalTime=this._time=this._rawPrevTime=t;n;)s=n._next,(n._active||t>=n._startTime&&!n._paused)&&(n._reversed?n.render((n._dirty?n.totalDuration():n._totalDuration)-(t-n._startTime)*n._timeScale,e,i):n.render((t-n._startTime)*n._timeScale,e,i)),n=s},n.rawTime=function(){return a||r.wake(),this._totalTime};var D=d("TweenLite",function(e,i,s){if(x.call(this,i,s),this.render=D.prototype.render,null==e)throw"Cannot tween a null target.";this.target=e="string"!=typeof e?e:D.selector(e)||e;var n,r,a,o=e.jquery||e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType),l=this.vars.overwrite;if(this._overwrite=l=null==l?G[D.defaultOverwrite]:"number"==typeof l?l>>0:G[l],(o||e instanceof Array||e.push&&m(e))&&"number"!=typeof e[0])for(this._targets=a=_.call(e,0),this._propLookup=[],this._siblings=[],n=0;a.length>n;n++)r=a[n],r?"string"!=typeof r?r.length&&r!==t&&r[0]&&(r[0]===t||r[0].nodeType&&r[0].style&&!r.nodeType)?(a.splice(n--,1),this._targets=a=a.concat(_.call(r,0))):(this._siblings[n]=M(r,this,!1),1===l&&this._siblings[n].length>1&&$(r,this,null,1,this._siblings[n])):(r=a[n--]=D.selector(r),"string"==typeof r&&a.splice(n+1,1)):a.splice(n--,1);else this._propLookup={},this._siblings=M(e,this,!1),1===l&&this._siblings.length>1&&$(e,this,null,1,this._siblings);(this.vars.immediateRender||0===i&&0===this._delay&&this.vars.immediateRender!==!1)&&(this._time=-h,this.render(-this._delay))},!0),I=function(e){return e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType)},E=function(t,e){var i,s={};for(i in t)j[i]||i in e&&"transform"!==i&&"x"!==i&&"y"!==i&&"width"!==i&&"height"!==i&&"className"!==i&&"border"!==i||!(!L[i]||L[i]&&L[i]._autoCSS)||(s[i]=t[i],delete t[i]);t.css=s};n=D.prototype=new x,n.constructor=D,n.kill()._gc=!1,n.ratio=0,n._firstPT=n._targets=n._overwrittenProps=n._startAt=null,n._notifyPluginsOfEnabled=n._lazy=!1,D.version="1.12.1",D.defaultEase=n._ease=new T(null,null,1,1),D.defaultOverwrite="auto",D.ticker=r,D.autoSleep=!0,D.lagSmoothing=function(t,e){r.lagSmoothing(t,e)},D.selector=t.$||t.jQuery||function(e){return t.$?(D.selector=t.$,t.$(e)):t.document?t.document.getElementById("#"===e.charAt(0)?e.substr(1):e):e};var z=[],O={},N=D._internals={isArray:m,isSelector:I,lazyTweens:z},L=D._plugins={},U=N.tweenLookup={},F=0,j=N.reservedProps={ease:1,delay:1,overwrite:1,onComplete:1,onCompleteParams:1,onCompleteScope:1,useFrames:1,runBackwards:1,startAt:1,onUpdate:1,onUpdateParams:1,onUpdateScope:1,onStart:1,onStartParams:1,onStartScope:1,onReverseComplete:1,onReverseCompleteParams:1,onReverseCompleteScope:1,onRepeat:1,onRepeatParams:1,onRepeatScope:1,easeParams:1,yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,data:1,paused:1,reversed:1,autoCSS:1,lazy:1},G={none:0,all:1,auto:2,concurrent:3,allOnStart:4,preexisting:5,"true":1,"false":0},Q=x._rootFramesTimeline=new R,B=x._rootTimeline=new R,q=function(){var t=z.length;for(O={};--t>-1;)i=z[t],i&&i._lazy!==!1&&(i.render(i._lazy,!1,!0),i._lazy=!1);z.length=0};B._startTime=r.time,Q._startTime=r.frame,B._active=Q._active=!0,setTimeout(q,1),x._updateRoot=D.render=function(){var t,e,i;if(z.length&&q(),B.render((r.time-B._startTime)*B._timeScale,!1,!1),Q.render((r.frame-Q._startTime)*Q._timeScale,!1,!1),z.length&&q(),!(r.frame%120)){for(i in U){for(e=U[i].tweens,t=e.length;--t>-1;)e[t]._gc&&e.splice(t,1);0===e.length&&delete U[i]}if(i=B._first,(!i||i._paused)&&D.autoSleep&&!Q._first&&1===r._listeners.tick.length){for(;i&&i._paused;)i=i._next;i||r.sleep()}}},r.addEventListener("tick",x._updateRoot);var M=function(t,e,i){var s,n,r=t._gsTweenID;if(U[r||(t._gsTweenID=r="t"+F++)]||(U[r]={target:t,tweens:[]}),e&&(s=U[r].tweens,s[n=s.length]=e,i))for(;--n>-1;)s[n]===e&&s.splice(n,1);return U[r].tweens},$=function(t,e,i,s,n){var r,a,o,l;if(1===s||s>=4){for(l=n.length,r=0;l>r;r++)if((o=n[r])!==e)o._gc||o._enabled(!1,!1)&&(a=!0);else if(5===s)break;return a}var _,u=e._startTime+h,m=[],f=0,p=0===e._duration;for(r=n.length;--r>-1;)(o=n[r])===e||o._gc||o._paused||(o._timeline!==e._timeline?(_=_||K(e,0,p),0===K(o,_,p)&&(m[f++]=o)):u>=o._startTime&&o._startTime+o.totalDuration()/o._timeScale>u&&((p||!o._initted)&&2e-10>=u-o._startTime||(m[f++]=o)));for(r=f;--r>-1;)o=m[r],2===s&&o._kill(i,t)&&(a=!0),(2!==s||!o._firstPT&&o._initted)&&o._enabled(!1,!1)&&(a=!0);return a},K=function(t,e,i){for(var s=t._timeline,n=s._timeScale,r=t._startTime;s._timeline;){if(r+=s._startTime,n*=s._timeScale,s._paused)return-100;s=s._timeline}return r/=n,r>e?r-e:i&&r===e||!t._initted&&2*h>r-e?h:(r+=t.totalDuration()/t._timeScale/n)>e+h?0:r-e-h};n._init=function(){var t,e,i,s,n,r=this.vars,a=this._overwrittenProps,o=this._duration,l=!!r.immediateRender,h=r.ease;if(r.startAt){this._startAt&&(this._startAt.render(-1,!0),this._startAt.kill()),n={};for(s in r.startAt)n[s]=r.startAt[s];if(n.overwrite=!1,n.immediateRender=!0,n.lazy=l&&r.lazy!==!1,n.startAt=n.delay=null,this._startAt=D.to(this.target,0,n),l)if(this._time>0)this._startAt=null;else if(0!==o)return}else if(r.runBackwards&&0!==o)if(this._startAt)this._startAt.render(-1,!0),this._startAt.kill(),this._startAt=null;else{i={};for(s in r)j[s]&&"autoCSS"!==s||(i[s]=r[s]);if(i.overwrite=0,i.data="isFromStart",i.lazy=l&&r.lazy!==!1,i.immediateRender=l,this._startAt=D.to(this.target,0,i),l){if(0===this._time)return}else this._startAt._init(),this._startAt._enabled(!1)}if(this._ease=h?h instanceof T?r.easeParams instanceof Array?h.config.apply(h,r.easeParams):h:"function"==typeof h?new T(h,r.easeParams):y[h]||D.defaultEase:D.defaultEase,this._easeType=this._ease._type,this._easePower=this._ease._power,this._firstPT=null,this._targets)for(t=this._targets.length;--t>-1;)this._initProps(this._targets[t],this._propLookup[t]={},this._siblings[t],a?a[t]:null)&&(e=!0);else e=this._initProps(this.target,this._propLookup,this._siblings,a);if(e&&D._onPluginEvent("_onInitAllProps",this),a&&(this._firstPT||"function"!=typeof this.target&&this._enabled(!1,!1)),r.runBackwards)for(i=this._firstPT;i;)i.s+=i.c,i.c=-i.c,i=i._next;this._onUpdate=r.onUpdate,this._initted=!0},n._initProps=function(e,i,s,n){var r,a,o,l,h,_;if(null==e)return!1;O[e._gsTweenID]&&q(),this.vars.css||e.style&&e!==t&&e.nodeType&&L.css&&this.vars.autoCSS!==!1&&E(this.vars,e);for(r in this.vars){if(_=this.vars[r],j[r])_&&(_ instanceof Array||_.push&&m(_))&&-1!==_.join("").indexOf("{self}")&&(this.vars[r]=_=this._swapSelfInParams(_,this));else if(L[r]&&(l=new L[r])._onInitTween(e,this.vars[r],this)){for(this._firstPT=h={_next:this._firstPT,t:l,p:"setRatio",s:0,c:1,f:!0,n:r,pg:!0,pr:l._priority},a=l._overwriteProps.length;--a>-1;)i[l._overwriteProps[a]]=this._firstPT;(l._priority||l._onInitAllProps)&&(o=!0),(l._onDisable||l._onEnable)&&(this._notifyPluginsOfEnabled=!0)}else this._firstPT=i[r]=h={_next:this._firstPT,t:e,p:r,f:"function"==typeof e[r],n:r,pg:!1,pr:0},h.s=h.f?e[r.indexOf("set")||"function"!=typeof e["get"+r.substr(3)]?r:"get"+r.substr(3)]():parseFloat(e[r]),h.c="string"==typeof _&&"="===_.charAt(1)?parseInt(_.charAt(0)+"1",10)*Number(_.substr(2)):Number(_)-h.s||0;h&&h._next&&(h._next._prev=h)}return n&&this._kill(n,e)?this._initProps(e,i,s,n):this._overwrite>1&&this._firstPT&&s.length>1&&$(e,this,i,this._overwrite,s)?(this._kill(i,e),this._initProps(e,i,s,n)):(this._firstPT&&(this.vars.lazy!==!1&&this._duration||this.vars.lazy&&!this._duration)&&(O[e._gsTweenID]=!0),o)},n.render=function(t,e,i){var s,n,r,a,o=this._time,l=this._duration,_=this._rawPrevTime;if(t>=l)this._totalTime=this._time=l,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1,this._reversed||(s=!0,n="onComplete"),0===l&&(this._initted||!this.vars.lazy||i)&&(this._startTime===this._timeline._duration&&(t=0),(0===t||0>_||_===h)&&_!==t&&(i=!0,_>h&&(n="onReverseComplete")),this._rawPrevTime=a=!e||t||_===t?t:h);else if(1e-7>t)this._totalTime=this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==o||0===l&&_>0&&_!==h)&&(n="onReverseComplete",s=this._reversed),0>t?(this._active=!1,0===l&&(this._initted||!this.vars.lazy||i)&&(_>=0&&(i=!0),this._rawPrevTime=a=!e||t||_===t?t:h)):this._initted||(i=!0);else if(this._totalTime=this._time=t,this._easeType){var u=t/l,m=this._easeType,f=this._easePower;(1===m||3===m&&u>=.5)&&(u=1-u),3===m&&(u*=2),1===f?u*=u:2===f?u*=u*u:3===f?u*=u*u*u:4===f&&(u*=u*u*u*u),this.ratio=1===m?1-u:2===m?u:.5>t/l?u/2:1-u/2}else this.ratio=this._ease.getRatio(t/l);if(this._time!==o||i){if(!this._initted){if(this._init(),!this._initted||this._gc)return;if(!i&&this._firstPT&&(this.vars.lazy!==!1&&this._duration||this.vars.lazy&&!this._duration))return this._time=this._totalTime=o,this._rawPrevTime=_,z.push(this),this._lazy=t,void 0;this._time&&!s?this.ratio=this._ease.getRatio(this._time/l):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(this._lazy!==!1&&(this._lazy=!1),this._active||!this._paused&&this._time!==o&&t>=0&&(this._active=!0),0===o&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):n||(n="_dummyGS")),this.vars.onStart&&(0!==this._time||0===l)&&(e||this.vars.onStart.apply(this.vars.onStartScope||this,this.vars.onStartParams||g))),r=this._firstPT;r;)r.f?r.t[r.p](r.c*this.ratio+r.s):r.t[r.p]=r.c*this.ratio+r.s,r=r._next;this._onUpdate&&(0>t&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._time!==o||s)&&this._onUpdate.apply(this.vars.onUpdateScope||this,this.vars.onUpdateParams||g)),n&&(this._gc||(0>t&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[n]&&this.vars[n].apply(this.vars[n+"Scope"]||this,this.vars[n+"Params"]||g),0===l&&this._rawPrevTime===h&&a!==h&&(this._rawPrevTime=0)))}},n._kill=function(t,e){if("all"===t&&(t=null),null==t&&(null==e||e===this.target))return this._lazy=!1,this._enabled(!1,!1);e="string"!=typeof e?e||this._targets||this.target:D.selector(e)||e;var i,s,n,r,a,o,l,h;if((m(e)||I(e))&&"number"!=typeof e[0])for(i=e.length;--i>-1;)this._kill(t,e[i])&&(o=!0);else{if(this._targets){for(i=this._targets.length;--i>-1;)if(e===this._targets[i]){a=this._propLookup[i]||{},this._overwrittenProps=this._overwrittenProps||[],s=this._overwrittenProps[i]=t?this._overwrittenProps[i]||{}:"all";break}}else{if(e!==this.target)return!1;a=this._propLookup,s=this._overwrittenProps=t?this._overwrittenProps||{}:"all"}if(a){l=t||a,h=t!==s&&"all"!==s&&t!==a&&("object"!=typeof t||!t._tempKill);for(n in l)(r=a[n])&&(r.pg&&r.t._kill(l)&&(o=!0),r.pg&&0!==r.t._overwriteProps.length||(r._prev?r._prev._next=r._next:r===this._firstPT&&(this._firstPT=r._next),r._next&&(r._next._prev=r._prev),r._next=r._prev=null),delete a[n]),h&&(s[n]=1);!this._firstPT&&this._initted&&this._enabled(!1,!1)}}return o},n.invalidate=function(){return this._notifyPluginsOfEnabled&&D._onPluginEvent("_onDisable",this),this._firstPT=null,this._overwrittenProps=null,this._onUpdate=null,this._startAt=null,this._initted=this._active=this._notifyPluginsOfEnabled=this._lazy=!1,this._propLookup=this._targets?{}:[],this},n._enabled=function(t,e){if(a||r.wake(),t&&this._gc){var i,s=this._targets;if(s)for(i=s.length;--i>-1;)this._siblings[i]=M(s[i],this,!0);else this._siblings=M(this.target,this,!0)}return x.prototype._enabled.call(this,t,e),this._notifyPluginsOfEnabled&&this._firstPT?D._onPluginEvent(t?"_onEnable":"_onDisable",this):!1},D.to=function(t,e,i){return new D(t,e,i)},D.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new D(t,e,i)},D.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new D(t,e,s)},D.delayedCall=function(t,e,i,s,n){return new D(e,0,{delay:t,onComplete:e,onCompleteParams:i,onCompleteScope:s,onReverseComplete:e,onReverseCompleteParams:i,onReverseCompleteScope:s,immediateRender:!1,useFrames:n,overwrite:0})},D.set=function(t,e){return new D(t,0,e)},D.getTweensOf=function(t,e){if(null==t)return[];t="string"!=typeof t?t:D.selector(t)||t;var i,s,n,r;if((m(t)||I(t))&&"number"!=typeof t[0]){for(i=t.length,s=[];--i>-1;)s=s.concat(D.getTweensOf(t[i],e));for(i=s.length;--i>-1;)for(r=s[i],n=i;--n>-1;)r===s[n]&&s.splice(i,1)}else for(s=M(t).concat(),i=s.length;--i>-1;)(s[i]._gc||e&&!s[i].isActive())&&s.splice(i,1);return s},D.killTweensOf=D.killDelayedCallsTo=function(t,e,i){"object"==typeof e&&(i=e,e=!1);for(var s=D.getTweensOf(t,e),n=s.length;--n>-1;)s[n]._kill(i,t)};var H=d("plugins.TweenPlugin",function(t,e){this._overwriteProps=(t||"").split(","),this._propName=this._overwriteProps[0],this._priority=e||0,this._super=H.prototype},!0);if(n=H.prototype,H.version="1.10.1",H.API=2,n._firstPT=null,n._addTween=function(t,e,i,s,n,r){var a,o;return null!=s&&(a="number"==typeof s||"="!==s.charAt(1)?Number(s)-i:parseInt(s.charAt(0)+"1",10)*Number(s.substr(2)))?(this._firstPT=o={_next:this._firstPT,t:t,p:e,s:i,c:a,f:"function"==typeof t[e],n:n||e,r:r},o._next&&(o._next._prev=o),o):void 0},n.setRatio=function(t){for(var e,i=this._firstPT,s=1e-6;i;)e=i.c*t+i.s,i.r?e=Math.round(e):s>e&&e>-s&&(e=0),i.f?i.t[i.p](e):i.t[i.p]=e,i=i._next},n._kill=function(t){var e,i=this._overwriteProps,s=this._firstPT;if(null!=t[this._propName])this._overwriteProps=[];else for(e=i.length;--e>-1;)null!=t[i[e]]&&i.splice(e,1);for(;s;)null!=t[s.n]&&(s._next&&(s._next._prev=s._prev),s._prev?(s._prev._next=s._next,s._prev=null):this._firstPT===s&&(this._firstPT=s._next)),s=s._next;return!1},n._roundProps=function(t,e){for(var i=this._firstPT;i;)(t[this._propName]||null!=i.n&&t[i.n.split(this._propName+"_").join("")])&&(i.r=e),i=i._next},D._onPluginEvent=function(t,e){var i,s,n,r,a,o=e._firstPT;if("_onInitAllProps"===t){for(;o;){for(a=o._next,s=n;s&&s.pr>o.pr;)s=s._next;(o._prev=s?s._prev:r)?o._prev._next=o:n=o,(o._next=s)?s._prev=o:r=o,o=a}o=e._firstPT=n}for(;o;)o.pg&&"function"==typeof o.t[t]&&o.t[t]()&&(i=!0),o=o._next;return i},H.activate=function(t){for(var e=t.length;--e>-1;)t[e].API===H.API&&(L[(new t[e])._propName]=t[e]);return!0},c.plugin=function(t){if(!(t&&t.propName&&t.init&&t.API))throw"illegal plugin definition.";var e,i=t.propName,s=t.priority||0,n=t.overwriteProps,r={init:"_onInitTween",set:"setRatio",kill:"_kill",round:"_roundProps",initAll:"_onInitAllProps"},a=d("plugins."+i.charAt(0).toUpperCase()+i.substr(1)+"Plugin",function(){H.call(this,i,s),this._overwriteProps=n||[]},t.global===!0),o=a.prototype=new H(i);o.constructor=a,a.API=t.API;for(e in r)"function"==typeof t[e]&&(o[r[e]]=t[e]);return a.version=t.version,H.activate([a]),a},i=t._gsQueue){for(s=0;i.length>s;s++)i[s]();for(n in f)f[n].func||t.console.log("GSAP encountered missing dependency: com.greensock."+n)}a=!1}})(window);	


;(function($,window,document,undefined){
  var pluginName = 'ccCarouselParallax',
      defaults = {
        ease:Linear.easeNone,
        selector:'.parallax-gal-slide',
        speed:1,
        rows:[0,75,127],
        perspective:[200,300,400],
        viewport:1700
      };

  function Plugin(element, options){
    this.el = element;
    this.$el = $(element);
    this.options = $.extend({}, defaults, options);
    this.init();
  }

  /*plugin methods*/
  Plugin.prototype.init = function(){

    _private.offsetX = (this.options.perspective[0] - 100) / 2;
    var min_gap = 250 / this.options.viewport * 100;

    var that = this;
    this.$collection = $(this.options.selector,this.$el);
    this._isAnimating = false;
    this._total = this.$collection.length;
    var newx, rowy, r;
    this.$collection.each(function(ind, item){
    	// var ll = this.style.left;
	    // if($(item).parent().width() < 800 ) {
	    // 	ll = parseInt(ll) + 5;
	    // 	this.style.left = ll+'%';
	    // }
      r = parseInt($(this).data('row')) - 1;
      //newx = (newx ? (newx + (Math.random()*201/1366*100 >> 0 ) + min_gap) : ((Math.random()*201/1366*100 >> 0 ) + min_gap - _private.offsetX));
      rowy = that.options.rows[r];
      //TweenLite.set(this, { top:rowy/*, left:Math.round(newx)+"%" */});
	    if($(window).width() <= 768) {
	    	this.style.top = "0px";
	    }
	    else {
	    	this.style.top = rowy+"px";
	    	$(this).data('left',parseInt($(this).get(0).style.left));
      		$(this).data('perspective',that.options.perspective[r]);
	    }
    });

    if (Modernizr.touch) {
      hammertime = new Hammer(this.el);
      Hammer.on(this.el,'touchstart',function(evt){
        _private.cDeltaX = 0;
        _private.pDeltaX = 0;
        clearInterval(_private.scrollInt);
      });

      hammertime.on('panmove',function(evt){
        _private.pDeltaX = _private.cDeltaX;
        _private.cDeltaX = evt.deltaX;

        updateCarousel.call(that,(_private.cDeltaX - _private.pDeltaX)/10*.5);
      });

      hammertime.on('panend',function(evt){
        _private.scrollDeltaX = _private.cDeltaX - _private.pDeltaX;
        _private.scrollInt = setTimeout(function draw() {
          if(Math.abs(_private.scrollDeltaX) - Math.abs(_private.scrollDeltaX*0.05) > 0){
            _private.scrollInt = setTimeout(draw, 1000 / 59);
            _private.scrollDeltaX = _private.scrollDeltaX - (_private.scrollDeltaX > 0 ? _private.scrollDeltaX*0.05 : _private.scrollDeltaX*0.05);
          }else{
            _private.scrollDeltaX = 0;
          }
          requestAnimationFrame(function(){
            updateCarousel.call(that,_private.scrollDeltaX/10*.5);});
          } , 1000 / 59);
      });
    }else{
      this.$el.parent().on('mousemove', function(evt){
        var half_width = $(this).width()/2;
         _private.perc = ( half_width - (evt.pageX-$(this).offset().left) ) / half_width;
      });
      this.$el.parent().on('mouseenter', function (evt) {
        _private.scrollInt = setTimeout(function draw() {
          _private.scrollInt = setTimeout(draw, 1000 / 59);
          requestAnimationFrame(function(){ updateCarousel.call(that);});
        } , 1000 / 59);
      });

      this.$el.parent().on('mouseleave', function (evt) {
        clearInterval(_private.scrollInt);
      });
    }

    /*this.$el.on('mousemove', (function(scope){
      return  function (evt) {
                var delta = evt.originalEvent.webkitMovementX;
                updateCarousel.call(scope, delta);
              }
      })(this));*/

    this.$el.trigger('ready');
    this.$el.addClass('ready');
  };

  /*plugin entry point*/
  $.fn[pluginName] = function(options, args){
    return this.each(function(){
      var instance = $(this).data('plugin_' + pluginName);
      if (!instance) {
        $(this).data('plugin_' + pluginName, new Plugin(this, options));
      } else if (instance[options]){
        instance[options].call(instance, args);
      } else {
        $.error('Method ' +  options + ' does not exist on jQuery.' + pluginName);
      }
    });
  };


  var _private = {
    crow:-1,
    position:0,
    scrollInt:undefined,
    offsetX:0,
    perc:1,
    hammertime:null,
    delta:0
  }

  /* pivate methods */
  function updateCarousel(delta){
    //_private.position += delta;
    //_private.position = (scrollWidth + _private.position) % scrollWidth;
    var delta = delta || .15 * _private.perc
    var that = this;
     this.$collection.each(function(){
      var perspective = $(this).data('perspective');
      var step = perspective / 100 * delta;
      var oldLeft = $(this).data('left');
      var newLeft = ((perspective + oldLeft + step + _private.offsetX) % perspective - _private.offsetX);
      //TweenLite.set(this, { left: newLeft + '%'});
    
      //	newLeft = newLeft += 10;
  
     	if($(window).width() <= 992) {
	    	this.style.left = "0%";
	    }
	    else {
	    	 this.style.left = newLeft + '%';
	    	 $(this).data('left',newLeft);
	    }
    });
  }


})(jQuery,window,document);


(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());	