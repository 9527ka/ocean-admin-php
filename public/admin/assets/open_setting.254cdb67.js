import{_ as w}from"./index.8ec9e1f4.js";import{X as C,V as b,C as V,D as y,F as k,w as x}from"./element-plus.f96e9a80.js";import{r as F}from"./index.91627cac.js";import{d as f,a0 as S,s as I,am as R,o as d,c as q,W as e,O as u,a,u as n,P as N,M as O,T}from"./@vue.4b2a3026.js";import"./@vueuse.150327d1.js";import"./@element-plus.c80de70c.js";import"./lodash-es.2b4cc642.js";import"./dayjs.f46d1cd6.js";import"./balanced-match.aa21c01a.js";import"./async-validator.fb49d0f5.js";import"./@ctrl.b082b0c1.js";import"./@popperjs.36402333.js";import"./escape-html.e5dfadb9.js";import"./normalize-wheel-es.8aeb3683.js";import"./lodash.d6bb5e00.js";import"./axios.820613cd.js";import"./vue-router.4d1437e2.js";import"./pinia.23f1b180.js";import"./css-color-function.cee2f610.js";import"./color-convert.755d189f.js";import"./color-name.e7a4e1d3.js";import"./ms.564e106c.js";import"./nprogress.acc17954.js";import"./vue-clipboard3.5b3f624f.js";import"./clipboard.53ca536a.js";import"./echarts.004f4e72.js";import"./zrender.b56a9aa5.js";import"./tslib.60310f1a.js";import"./highlight.js.db90315f.js";import"./@highlightjs.c9907823.js";function U(s){return F.post({url:"/channel.open_setting/setConfig",params:s})}function M(){return F.get({url:"/channel.open_setting/getConfig"})}const P=a("div",{class:"font-medium mb-7"},"\u7F51\u7AD9\u5E94\u7528",-1),W={class:"w-80"},X={class:"w-80"},j=f({name:"wxDevConfig"}),Ae=f({...j,setup(s){const t=S({app_id:"",app_secret:""}),l=I(),E={app_id:[{required:!0,message:"\u8BF7\u8F93\u5165AppID",trigger:["blur","change"]}],app_secret:[{required:!0,message:"\u8BF7\u8F93\u5165AppSecret",trigger:["blur","change"]}]},i=async()=>{const r=await M();for(const o in t)t[o]=r[o]},g=async()=>{var r;await((r=l.value)==null?void 0:r.validate()),await U(t),i()};return i(),(r,o)=>{const D=C,m=b,c=V,_=y,A=k,B=x,v=w,h=R("perms");return d(),q("div",null,[e(m,{class:"!border-none",shadow:"never"},{default:u(()=>[e(D,{type:"warning",title:"\u6E29\u99A8\u63D0\u793A\uFF1A\u586B\u5199\u5FAE\u4FE1\u5F00\u653E\u5E73\u53F0\u5F00\u53D1\u914D\u7F6E\uFF0C\u8BF7\u524D\u5F80\u5FAE\u4FE1\u5F00\u653E\u5E73\u53F0\u521B\u5EFA\u5E94\u7528\u5E76\u5B8C\u6210\u8BA4\u8BC1\uFF1B\u7F51\u7AD9\u5E94\u7528\u914D\u7F6E\u4E3B\u8981\u7528\u4E8E\u7F51\u7AD9\u5FAE\u4FE1\u767B\u5F55\u548C\u5FAE\u4FE1\u652F\u4ED8",closable:!1,"show-icon":""})]),_:1}),e(A,{ref_key:"formRef",ref:l,model:n(t),rules:E,"label-width":"160px"},{default:u(()=>[e(m,{class:"!border-none mt-4",shadow:"never"},{default:u(()=>[P,e(_,{label:"AppID",prop:"app_id"},{default:u(()=>[a("div",W,[e(c,{modelValue:n(t).app_id,"onUpdate:modelValue":o[0]||(o[0]=p=>n(t).app_id=p),placeholder:"\u8BF7\u8F93\u5165AppID"},null,8,["modelValue"])])]),_:1}),e(_,{label:"AppSecret",prop:"app_secret"},{default:u(()=>[a("div",null,[a("div",X,[e(c,{modelValue:n(t).app_secret,"onUpdate:modelValue":o[1]||(o[1]=p=>n(t).app_secret=p),placeholder:"\u8BF7\u8F93\u5165AppSecret"},null,8,["modelValue"])])])]),_:1})]),_:1})]),_:1},8,["model"]),N((d(),O(v,null,{default:u(()=>[e(B,{type:"primary",onClick:g},{default:u(()=>[T("\u4FDD\u5B58")]),_:1})]),_:1})),[[h,["channel.open_setting/setConfig"]]])])}}});export{Ae as default};
