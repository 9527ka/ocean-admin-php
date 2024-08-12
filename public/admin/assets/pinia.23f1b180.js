import{aj as H,r as M,ai as B,au as G,C as $,w as T,a0 as tt,j as E,av as D,t as et,g as st,e as nt,n as ot,aa as ct,b as rt}from"./@vue.4b2a3026.js";var ut=!1;/*!
 * pinia v2.2.0
 * (c) 2024 Eduardo San Martin Morote
 * @license MIT
 */let J;const R=t=>J=t,K=Symbol();function L(t){return t&&typeof t=="object"&&Object.prototype.toString.call(t)==="[object Object]"&&typeof t.toJSON!="function"}var x;(function(t){t.direct="direct",t.patchObject="patch object",t.patchFunction="patch function"})(x||(x={}));function vt(){const t=H(!0),c=t.run(()=>M({}));let s=[],e=[];const r=B({install(u){R(r),r._a=u,u.provide(K,r),u.config.globalProperties.$pinia=r,e.forEach(f=>s.push(f)),e=[]},use(u){return!this._a&&!ut?e.push(u):s.push(u),this},_p:s,_a:null,_e:t,_s:new Map,state:c});return r}const q=()=>{};function V(t,c,s,e=q){t.push(c);const r=()=>{const u=t.indexOf(c);u>-1&&(t.splice(u,1),e())};return!s&&st()&&nt(r),r}function p(t,...c){t.slice().forEach(s=>{s(...c)})}const at=t=>t(),A=Symbol(),k=Symbol();function O(t,c){t instanceof Map&&c instanceof Map?c.forEach((s,e)=>t.set(e,s)):t instanceof Set&&c instanceof Set&&c.forEach(t.add,t);for(const s in c){if(!c.hasOwnProperty(s))continue;const e=c[s],r=t[s];L(r)&&L(e)&&t.hasOwnProperty(s)&&!E(e)&&!D(e)?t[s]=O(r,e):t[s]=e}return t}const ft=Symbol();function it(t){return!L(t)||!t.hasOwnProperty(ft)}const{assign:y}=Object;function lt(t){return!!(E(t)&&t.effect)}function ht(t,c,s,e){const{state:r,actions:u,getters:f}=c,a=s.state.value[t];let C;function b(){a||(s.state.value[t]=r?r():{});const v=ct(s.state.value[t]);return y(v,u,Object.keys(f||{}).reduce((S,d)=>(S[d]=B(rt(()=>{R(s);const _=s._s.get(t);return f[d].call(_,_)})),S),{}))}return C=z(t,b,c,s,e,!0),C}function z(t,c,s={},e,r,u){let f;const a=y({actions:{}},s),C={deep:!0};let b,v,S=[],d=[],_;const m=e.state.value[t];!u&&!m&&(e.state.value[t]={}),M({});let W;function N(o){let n;b=v=!1,typeof o=="function"?(o(e.state.value[t]),n={type:x.patchFunction,storeId:t,events:_}):(O(e.state.value[t],o),n={type:x.patchObject,payload:o,storeId:t,events:_});const i=W=Symbol();ot().then(()=>{W===i&&(b=!0)}),v=!0,p(S,n,e.state.value[t])}const Q=u?function(){const{state:n}=s,i=n?n():{};this.$patch(j=>{y(j,i)})}:q;function U(){f.stop(),S=[],d=[],e._s.delete(t)}const F=(o,n="")=>{if(A in o)return o[k]=n,o;const i=function(){R(e);const j=Array.from(arguments),g=[],I=[];function Y(l){g.push(l)}function Z(l){I.push(l)}p(d,{args:j,name:i[k],store:h,after:Y,onError:Z});let w;try{w=o.apply(this&&this.$id===t?this:h,j)}catch(l){throw p(I,l),l}return w instanceof Promise?w.then(l=>(p(g,l),l)).catch(l=>(p(I,l),Promise.reject(l))):(p(g,w),w)};return i[A]=!0,i[k]=n,i},X={_p:e,$id:t,$onAction:V.bind(null,d),$patch:N,$reset:Q,$subscribe(o,n={}){const i=V(S,o,n.detached,()=>j()),j=f.run(()=>T(()=>e.state.value[t],g=>{(n.flush==="sync"?v:b)&&o({storeId:t,type:x.direct,events:_},g)},y({},C,n)));return i},$dispose:U},h=tt(X);e._s.set(t,h);const P=(e._a&&e._a.runWithContext||at)(()=>e._e.run(()=>(f=H()).run(()=>c({action:F}))));for(const o in P){const n=P[o];if(E(n)&&!lt(n)||D(n))u||(m&&it(n)&&(E(n)?n.value=m[o]:O(n,m[o])),e.state.value[t][o]=n);else if(typeof n=="function"){const i=F(n,o);P[o]=i,a.actions[o]=n}}return y(h,P),y(et(h),P),Object.defineProperty(h,"$state",{get:()=>e.state.value[t],set:o=>{N(n=>{y(n,o)})}}),e._p.forEach(o=>{y(h,f.run(()=>o({store:h,app:e._a,pinia:e,options:a})))}),m&&u&&s.hydrate&&s.hydrate(h.$state,m),b=!0,v=!0,h}function St(t,c,s){let e,r;const u=typeof c=="function";typeof t=="string"?(e=t,r=u?s:c):(r=t,e=t.id);function f(a,C){const b=G();return a=a||(b?$(K,null):null),a&&R(a),a=J,a._s.has(e)||(u?z(e,c,r,a):ht(e,r,a)),a._s.get(e)}return f.$id=e,f}export{vt as c,St as d};
