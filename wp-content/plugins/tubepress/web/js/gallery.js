/**
 * @license
 *
 * Copyright 2006 - 2016 TubePress LLC (http://tubepress.com).
 * This file is part of TubePress (http://tubepress.com).
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
var tubePressGalleryRegistrar;!function(t){"use strict";var e="tubepress",n="gallery",r="item",i=".",u="_",a="-",o="#",c=" ",s="player",f="Id",l="id",d="params",g="sys",m="js",v="div",p="fluid",h="class",b=p+"Thumbs",O="html",y="thumb",E="length",T=y+"s",A=m+a,w=e+a,x=n+f,j=r+f,S=i+A,M=u+n+u,_=e+i+n+i,k=_+"load",G=_+"new"+T,L=_+r+i+"change",P=_+s+i,D=P+"populate"+i,I=P+"invoke"+i,R=t.Beacon,U=R.subscribe,B=R.publish,Q=t.Lang.Utils,z=Q.isDefined,C=t.Environment,H=!0,V=!1,W=t.Vendors.jQuery,q=function(){var t={},r={},i=function(t){return o+e+M+t},u=function(t){return S+w+n+a+t},s=function(e){if(Q.isDefined(t[e]))return t[e];var n=i(e),r=u(e),a=W(n).add(r);return a.length>0&&(t[e]=a),a},f=function(t){return u(t)+c+S+w+"pagination-and-"+T},l=function(t){return o+e+M+t+"_thumbnail_area"},d=function(t){return Q.isDefined(r[t])||(r[t]=W(l(t)).add(f(t))),r[t]};return{getOutermostElement:s,getOutermostSelectorLegacy:i,getOutermostSelectorModern:u,getThumbAreaSelectorLegacy:l,getThumbAreaSelectorModern:f,getThumbAreaElement:d}}(),F=function(){var t=W.data,e=function(t){return q.getOutermostElement(t)},n=function(n,r){return t(e(n),r)},r=function(n,r,i){t(e(n),r,i)};return{get:n,set:r}}(),J=function(){var t="options",e="ephemeral",n=W.isPlainObject,r=function(t,e){var r=F.get(t,d);return""!==r&&n(r)&&z(r[e])&&n(r[e])?r[e]:{}},i=function(t,e,n,i){var u=r(t,e);return z(u[n])?u[n]:i},u=function(e,n,r){return i(e,t,n,r)},a=function(t){return r(t,e)},o=function(t,e){var n=e[x],r=e[d];F.set(n,d,r)};return U(k,o),{getOption:u,getEphemeralOptions:a}}(),K=function(){var t={},e=function(e,n){var r=n[x];t[r]=n[d]},n=function(){return W.extend(!0,{},t)};return U(k,e),{getAll:n}}(),N=function(){var t=function(t,e){var n={};n[x]=t,n[d]=e,B(k,n)};return{register:t}}();!function(){var t=function(t,e){var n=e[x];F.set(n,l,n)};U(k,t)}(),function(){var t=[],n=Math.floor,r="first",o="100%",s="width",f="px",l=function(t,e){return e.indexOf(t,e[E]-t[E])!==-1},d=function(t){var e=t.css(s);return e&&l(f,e)?e.replace(f,""):t.width()},g=function(t){var n,o,s,f=q.getOutermostSelectorModern(t)+c+S+w+p+a+y+a+"reference:"+r,l=W(f);return l[E]>0?d(l):(n=q.getThumbAreaElement(t),o=n.find("img:"+r),s=120,0===o[E]&&(o=n.find(v+i+e+u+y+":"+r+" > "+v+i+e+"_embed"),0===o[E])?s:d(o))},m=function(t){q.getThumbAreaElement(t).css({width:o});var r=g(t),c=q.getThumbAreaElement(t),f=c.width(),l=n(f/r),d=n(f/l),m=i+e+u+y,v=S+w+p+a+y+a+"adjustable",h=c.find(v).add(c.find(m)),O={},E={};E[s]=o,c.css(E),E[s]=f,c.css(E),E[s]=d,h.css(E),c.data(p+u+T+"_applied",H),O[x]=t,O.newThumbWidth=d,B(_+b,O)},h=function(e,n){var r=n[x];J.getOption(r,b,V)&&(W.inArray(r,t)===-1&&t.push(r),m(r))},O=function(e){var n=0,r=t[E],i={};for(n;n<r;n+=1)i[x]=t[n],h(e,i)};U(G+c+k,h),U(e+".window.resize",O)}(),function(){var t=function(t){return t[3]},n=function(t){var e=t.lastIndexOf(u);return t.substring(16,e)},r=function(){var e=W(this).attr("rel").split(u),r=n(W(this).attr(l)),i={};i[x]=t(e),i[j]=r,B(L,i)},i=function(t,n){W(o+e+M+n[x]+" a[id^='"+e+"_']").click(r)};U(G+c+k,i)}(),function(){var t=function(t,e){var n=t.attr(h).split(/\s+/),r=0;for(r;r<n[E];r+=1)if(0===n[r].indexOf(e))return n[r].replace(e,"");return null},e=function(e){var n=W(e.currentTarget),i=t(n,A+w+r+l+a),u={};u[x]=W.data(this,l),u[j]=i,B(L,u)},n=function(t,n){var r=n[x],i=q.getOutermostSelectorModern(r),u=q.getOutermostElement(r);W(i).on("click",S+w+"invoker",W.proxy(e,u))};U(k,n)}(),function(){var t=function(t,n){var i,a=n[x],o=n[j],c=J.getOption(a,s+"Location","?"),f="mediaItem",l=function(t){var e={};e[f]=t[f],e[O]=t[O],e[x]=a,e[j]=o,B(D+c,e)},d={},g={};d[e+u+"action"]=s+"Html",d[e+u+r]=o,d[e+u+"options"]=J.getEphemeralOptions(a),g[j]=o,g[x]=a,B(I+c,g),i=J.getOption(a,"httpMethod","GET"),W.ajax({data:d,dataType:"json",success:l,type:i,url:C.getAjaxEndpointUrl()})};U(L,t)}(),t.AsyncUtil.processQueueCalls("tubePressGalleryRegistrar",N),t.Gallery={Registry:K,Selectors:q,Options:J},t.Beacon.publish(e+i+m+i+g+i+n)}(TubePress);