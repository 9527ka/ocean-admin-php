import{Z as T,C as M,D as P,L as W,M as Z,t as z,F as G}from"./element-plus.f96e9a80.js";import{_ as H}from"./picker.a6dda4da.js";import{P as J}from"./index.ff756fc3.js";import{a as K}from"./useDictOptions.952f4e22.js";import{r as m}from"./index.91627cac.js";import{r as Q}from"./role.2a688656.js";import{e as X}from"./post.fba72568.js";import{d as Y}from"./department.d16dea0f.js";import{d as $,s as A,r as ee,b as ue,a0 as x,o as i,c as B,W as a,O as r,u as l,a as p,V as y,a7 as U,M as V,S as le}from"./@vue.4b2a3026.js";function Ve(d){return m.get({url:"/auth.admin/lists",params:d},{ignoreCancelToken:!0})}function oe(d){return m.post({url:"/auth.admin/add",params:d})}function ae(d){return m.post({url:"/auth.admin/edit",params:d})}function ve(d){return m.post({url:"/auth.admin/delete",params:d})}function te(d){return m.get({url:"/auth.admin/detail",params:d})}const re={class:"edit-popup"},de=p("div",{class:"form-tips"},"\u5EFA\u8BAE\u5C3A\u5BF8\uFF1A100*100px\uFF0C\u652F\u6301jpg\uFF0Cjpeg\uFF0Cpng\u683C\u5F0F",-1),se=p("div",{class:"form-tips"},"\u5141\u8BB8\u591A\u4EBA\u540C\u65F6\u5728\u7EBF\u767B\u5F55",-1),Ee=$({__name:"edit",emits:["success","close"],setup(d,{expose:j,emit:k}){const v=k,E=A(),c=A(),f=ee("add"),h=ue(()=>f.value=="edit"?"\u7F16\u8F91\u7BA1\u7406\u5458":"\u65B0\u589E\u7BA1\u7406\u5458"),u=x({id:"",account:"",name:"",dept_id:[],jobs_id:[],role_id:[],avatar:"",password:"",password_confirm:"",disable:0,multipoint_login:1,root:0}),w=(n,e,t)=>{u.password&&(e||t(new Error("\u8BF7\u518D\u6B21\u8F93\u5165\u5BC6\u7801")),e!==u.password&&t(new Error("\u4E24\u6B21\u8F93\u5165\u5BC6\u7801\u4E0D\u4E00\u81F4!"))),t()},_=x({account:[{required:!0,message:"\u8BF7\u8F93\u5165\u8D26\u53F7",trigger:["blur"]}],name:[{required:!0,message:"\u8BF7\u8F93\u5165\u540D\u79F0",trigger:["blur"]}],role_id:[{required:!0,validator:(n,e,t)=>{u.root||u.role_id.length?t():t(new Error("\u8BF7\u9009\u62E9\u89D2\u8272"))}}],password:[{required:!0,message:"\u8BF7\u8F93\u5165\u5BC6\u7801",trigger:["blur"]}],password_confirm:[{required:!0,message:"\u8BF7\u8F93\u5165\u786E\u8BA4\u5BC6\u7801",trigger:["blur"]},{validator:w,trigger:"blur"}]}),{optionsData:F}=K({role:{api:Q},jobs:{api:X},dept:{api:Y}}),q=async()=>{var n,e;await((n=E.value)==null?void 0:n.validate()),f.value=="edit"?await ae(u):await oe(u),(e=c.value)==null||e.close(),v("success")},R=(n="add")=>{var e;f.value=n,(e=c.value)==null||e.open()},S=async n=>{_.password=[],_.password_confirm=[{validator:w,trigger:"blur"}];const e=await te({id:n.id});for(const t in u)e[t]!=null&&e[t]!=null&&(u[t]=e[t])},I=()=>{v("close")};return j({open:R,setFormData:S}),(n,e)=>{const t=M,s=P,L=H,N=T,g=W,C=Z,D=z,O=G;return i(),B("div",re,[a(J,{ref_key:"popupRef",ref:c,title:l(h),async:!0,width:"550px",onConfirm:q,onClose:I},{default:r(()=>[a(O,{ref_key:"formRef",ref:E,model:l(u),"label-width":"84px",rules:l(_)},{default:r(()=>[a(s,{label:"\u8D26\u53F7",prop:"account"},{default:r(()=>[a(t,{modelValue:l(u).account,"onUpdate:modelValue":e[0]||(e[0]=o=>l(u).account=o),disabled:l(u).root==1,placeholder:"\u8BF7\u8F93\u5165\u8D26\u53F7",clearable:""},null,8,["modelValue","disabled"])]),_:1}),a(s,{label:"\u5934\u50CF"},{default:r(()=>[p("div",null,[p("div",null,[a(L,{modelValue:l(u).avatar,"onUpdate:modelValue":e[1]||(e[1]=o=>l(u).avatar=o),limit:1},null,8,["modelValue"])]),de])]),_:1}),a(s,{label:"\u540D\u79F0",prop:"name"},{default:r(()=>[a(t,{modelValue:l(u).name,"onUpdate:modelValue":e[2]||(e[2]=o=>l(u).name=o),placeholder:"\u8BF7\u8F93\u5165\u540D\u79F0",clearable:""},null,8,["modelValue"])]),_:1}),a(s,{label:"\u5F52\u5C5E\u90E8\u95E8",prop:"dept_id"},{default:r(()=>[a(N,{class:"flex-1",modelValue:l(u).dept_id,"onUpdate:modelValue":e[3]||(e[3]=o=>l(u).dept_id=o),data:l(F).dept,clearable:"",multiple:"","node-key":"id",props:{value:"id",label:"name",disabled(o){return o.status!==1}},"check-strictly":"","default-expand-all":!0,placeholder:"\u8BF7\u9009\u62E9\u4E0A\u7EA7\u90E8\u95E8"},null,8,["modelValue","data","props"])]),_:1}),a(s,{label:"\u5C97\u4F4D",prop:"jobs_id"},{default:r(()=>[a(C,{class:"flex-1",modelValue:l(u).jobs_id,"onUpdate:modelValue":e[4]||(e[4]=o=>l(u).jobs_id=o),clearable:"",multiple:"",placeholder:"\u8BF7\u9009\u62E9\u5C97\u4F4D"},{default:r(()=>[(i(!0),B(y,null,U(l(F).jobs,(o,b)=>(i(),V(g,{key:b,label:o.name,value:o.id},null,8,["label","value"]))),128))]),_:1},8,["modelValue"])]),_:1}),a(s,{label:"\u89D2\u8272",prop:"role_id"},{default:r(()=>[a(C,{modelValue:l(u).role_id,"onUpdate:modelValue":e[5]||(e[5]=o=>l(u).role_id=o),disabled:l(u).root==1,class:"flex-1",multiple:"",placeholder:"\u8BF7\u9009\u62E9\u89D2\u8272",clearable:""},{default:r(()=>[(i(!0),B(y,null,U(l(F).role,(o,b)=>(i(),V(g,{key:b,label:o.name,value:o.id},null,8,["label","value"]))),128))]),_:1},8,["modelValue","disabled"])]),_:1}),a(s,{label:"\u5BC6\u7801",prop:"password"},{default:r(()=>[a(t,{modelValue:l(u).password,"onUpdate:modelValue":e[6]||(e[6]=o=>l(u).password=o),"show-password":"",clearable:"",placeholder:"\u8BF7\u8F93\u5165\u5BC6\u7801"},null,8,["modelValue"])]),_:1}),a(s,{label:"\u786E\u8BA4\u5BC6\u7801",prop:"password_confirm"},{default:r(()=>[a(t,{modelValue:l(u).password_confirm,"onUpdate:modelValue":e[7]||(e[7]=o=>l(u).password_confirm=o),"show-password":"",clearable:"",placeholder:"\u8BF7\u8F93\u5165\u786E\u8BA4\u5BC6\u7801"},null,8,["modelValue"])]),_:1}),l(u).root!=1?(i(),V(s,{key:0,label:"\u7BA1\u7406\u5458\u72B6\u6001"},{default:r(()=>[a(D,{modelValue:l(u).disable,"onUpdate:modelValue":e[8]||(e[8]=o=>l(u).disable=o),"active-value":0,"inactive-value":1},null,8,["modelValue"])]),_:1})):le("",!0),a(s,{label:"\u591A\u5904\u767B\u5F55"},{default:r(()=>[p("div",null,[a(D,{modelValue:l(u).multipoint_login,"onUpdate:modelValue":e[9]||(e[9]=o=>l(u).multipoint_login=o),"active-value":1,"inactive-value":0},null,8,["modelValue"]),se])]),_:1})]),_:1},8,["model","rules"])]),_:1},8,["title"])])}}});export{Ee as _,Ve as a,ae as b,ve as c};
