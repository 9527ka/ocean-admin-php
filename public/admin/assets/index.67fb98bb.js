import{_ as z,C as Q,D as W,L as j,M as G,w as H,F as J,V as X,O as Y,P as Z,Q as ee}from"./element-plus.f96e9a80.js";import{f as te,b as ae}from"./index.91627cac.js";import{d as L,s as F,r as h,a0 as oe,i as le,n as g,am as ne,o as p,c as se,W as e,O as t,u as s,a8 as ie,T as i,a as ue,P as E,M as c,U as re,S as P}from"./@vue.4b2a3026.js";import{_ as pe}from"./edit.vue_vue_type_script_setup_true_lang.7768bec3.js";import{e as de,f as me}from"./department.d16dea0f.js";import"./@vueuse.150327d1.js";import"./@element-plus.c80de70c.js";import"./lodash-es.2b4cc642.js";import"./dayjs.f46d1cd6.js";import"./balanced-match.aa21c01a.js";import"./async-validator.fb49d0f5.js";import"./@ctrl.b082b0c1.js";import"./@popperjs.36402333.js";import"./escape-html.e5dfadb9.js";import"./normalize-wheel-es.8aeb3683.js";import"./lodash.d6bb5e00.js";import"./axios.820613cd.js";import"./vue-router.4d1437e2.js";import"./pinia.23f1b180.js";import"./css-color-function.cee2f610.js";import"./color-convert.755d189f.js";import"./color-name.e7a4e1d3.js";import"./ms.564e106c.js";import"./nprogress.acc17954.js";import"./vue-clipboard3.5b3f624f.js";import"./clipboard.53ca536a.js";import"./echarts.004f4e72.js";import"./zrender.b56a9aa5.js";import"./tslib.60310f1a.js";import"./highlight.js.db90315f.js";import"./@highlightjs.c9907823.js";import"./index.ff756fc3.js";import"./useDictOptions.952f4e22.js";const ce={class:"department"},_e=L({name:"department"}),He=L({..._e,setup(fe){const x=F(),_=F(),B=F();let k=!1;const C=h(!1),b=h([]),d=oe({status:"",name:""}),v=h(!1),m=async()=>{C.value=!0,b.value=await de(d),C.value=!1},N=()=>{var o;(o=B.value)==null||o.resetFields(),m()},D=async o=>{var a,n;v.value=!0,await g(),o&&((a=_.value)==null||a.setFormData({pid:o})),(n=_.value)==null||n.open("add")},S=async o=>{var a,n;v.value=!0,await g(),(a=_.value)==null||a.open("edit"),(n=_.value)==null||n.getDetail(o)},M=async o=>{await te.confirm("\u786E\u5B9A\u8981\u5220\u9664\uFF1F"),await me({id:o}),m()},V=()=>{k=!k,R(b.value,k)},R=(o,a=!0)=>{var n;for(const u in o)(n=x.value)==null||n.toggleRowExpansion(o[u],a),o[u].children&&R(o[u].children,a)};return le(async()=>{await m(),g(()=>{V()})}),(o,a)=>{const n=Q,u=W,w=j,O=G,r=H,U=J,$=X,A=ae,f=Y,I=z,K=Z,y=ne("perms"),q=ee;return p(),se("div",ce,[e($,{class:"!border-none",shadow:"never"},{default:t(()=>[e(U,{ref_key:"formRef",ref:B,class:"mb-[-16px]",model:s(d),inline:!0},{default:t(()=>[e(u,{label:"\u90E8\u95E8\u540D\u79F0",prop:"name"},{default:t(()=>[e(n,{class:"w-[280px]",modelValue:s(d).name,"onUpdate:modelValue":a[0]||(a[0]=l=>s(d).name=l),clearable:"",onKeyup:ie(m,["enter"])},null,8,["modelValue"])]),_:1}),e(u,{label:"\u90E8\u95E8\u72B6\u6001",prop:"status"},{default:t(()=>[e(O,{class:"w-[280px]",modelValue:s(d).status,"onUpdate:modelValue":a[1]||(a[1]=l=>s(d).status=l)},{default:t(()=>[e(w,{label:"\u5168\u90E8",value:""}),e(w,{label:"\u6B63\u5E38",value:"1"}),e(w,{label:"\u505C\u7528",value:"0"})]),_:1},8,["modelValue"])]),_:1}),e(u,null,{default:t(()=>[e(r,{type:"primary",onClick:m},{default:t(()=>[i("\u67E5\u8BE2")]),_:1}),e(r,{onClick:N},{default:t(()=>[i("\u91CD\u7F6E")]),_:1})]),_:1})]),_:1},8,["model"])]),_:1}),e($,{class:"!border-none mt-4",shadow:"never"},{default:t(()=>[ue("div",null,[E((p(),c(r,{type:"primary",onClick:a[2]||(a[2]=l=>D())},{icon:t(()=>[e(A,{name:"el-icon-Plus"})]),default:t(()=>[i(" \u65B0\u589E ")]),_:1})),[[y,["dept.dept/add"]]]),e(r,{onClick:V},{default:t(()=>[i(" \u5C55\u5F00/\u6298\u53E0 ")]),_:1})]),E((p(),c(K,{ref_key:"tableRef",ref:x,class:"mt-4",size:"large",data:s(b),"row-key":"id","tree-props":{children:"children",hasChildren:"hasChildren"}},{default:t(()=>[e(f,{label:"\u90E8\u95E8\u540D\u79F0",prop:"name","min-width":"150","show-overflow-tooltip":""}),e(f,{label:"\u90E8\u95E8\u72B6\u6001",prop:"status","min-width":"100"},{default:t(({row:l})=>[e(I,{class:"ml-2",type:l.status?"":"danger"},{default:t(()=>[i(re(l.status_desc),1)]),_:2},1032,["type"])]),_:1}),e(f,{label:"\u6392\u5E8F",prop:"sort","min-width":"100"}),e(f,{label:"\u66F4\u65B0\u65F6\u95F4",prop:"update_time","min-width":"180"}),e(f,{label:"\u64CD\u4F5C",width:"160",fixed:"right"},{default:t(({row:l})=>[E((p(),c(r,{type:"primary",link:"",onClick:T=>D(l.id)},{default:t(()=>[i(" \u65B0\u589E ")]),_:2},1032,["onClick"])),[[y,["dept.dept/add"]]]),E((p(),c(r,{type:"primary",link:"",onClick:T=>S(l)},{default:t(()=>[i(" \u7F16\u8F91 ")]),_:2},1032,["onClick"])),[[y,["dept.dept/edit"]]]),l.pid!==0?E((p(),c(r,{key:0,type:"danger",link:"",onClick:T=>M(l.id)},{default:t(()=>[i(" \u5220\u9664 ")]),_:2},1032,["onClick"])),[[y,["dept.dept/delete"]]]):P("",!0)]),_:1})]),_:1},8,["data"])),[[q,s(C)]])]),_:1}),s(v)?(p(),c(pe,{key:0,ref_key:"editRef",ref:_,onSuccess:m,onClose:a[3]||(a[3]=l=>v.value=!1)},null,512)):P("",!0)])}}});export{He as default};
