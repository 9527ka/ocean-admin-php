import{Y as P,V as $,o as R,w as V,D as q,F as M}from"./element-plus.f96e9a80.js";import{_ as N}from"./index.vue_vue_type_script_setup_true_lang.1a989044.js";import{k as U,b as O}from"./index.91627cac.js";import{g as S,u as T,a as z}from"./consumer.226342b9.js";import{_ as H}from"./account-adjust.vue_vue_type_script_setup_true_lang.6a1cdd62.js";import{u as I}from"./vue-router.4d1437e2.js";import{d as D,a0 as w,s as W,am as Y,o as d,c as G,W as e,O as t,u as a,a as c,T as l,U as u,P as f,M as F}from"./@vue.4b2a3026.js";import"./@vueuse.150327d1.js";import"./@element-plus.c80de70c.js";import"./lodash-es.2b4cc642.js";import"./dayjs.f46d1cd6.js";import"./balanced-match.aa21c01a.js";import"./async-validator.fb49d0f5.js";import"./@ctrl.b082b0c1.js";import"./@popperjs.36402333.js";import"./escape-html.e5dfadb9.js";import"./normalize-wheel-es.8aeb3683.js";import"./lodash.d6bb5e00.js";import"./axios.820613cd.js";import"./pinia.23f1b180.js";import"./css-color-function.cee2f610.js";import"./color-convert.755d189f.js";import"./color-name.e7a4e1d3.js";import"./ms.564e106c.js";import"./nprogress.acc17954.js";import"./vue-clipboard3.5b3f624f.js";import"./clipboard.53ca536a.js";import"./echarts.004f4e72.js";import"./zrender.b56a9aa5.js";import"./tslib.60310f1a.js";import"./highlight.js.db90315f.js";import"./@highlightjs.c9907823.js";import"./index.ff756fc3.js";const J={class:"bg-page flex py-5 mb-10 items-center"},K={class:"basis-40 flex flex-col justify-center items-center"},L=c("div",{class:"mb-2 text-tx-regular"},"\u7528\u6237\u5934\u50CF",-1),Q={class:"basis-40 flex flex-col justify-center items-center"},X=c("div",{class:"text-tx-regular"},"\u8D26\u6237\u4F59\u989D",-1),Z={class:"mt-2 flex items-center"},ee=D({name:"consumerDetail"}),qe=D({...ee,setup(te){const x=I(),s=w({avatar:"",channel:"",create_time:"",login_time:"",mobile:"",nickname:"",real_name:0,sex:0,sn:"",account:"",user_money:""}),m=w({show:!1,value:""}),h=W(),E=async()=>{const n=await S({id:x.query.id});Object.keys(s).forEach(o=>{s[o]=n[o]})},y=async(n,o)=>{U(n)||(await T({id:x.query.id,field:o,value:n}),E())},k=n=>{m.show=!0,m.value=n},A=async n=>{await z({user_id:x.query.id,...n}),m.show=!1,E()};return E(),(n,o)=>{const g=P,C=$,B=R,p=V,i=q,v=O,b=N,j=M,_=Y("perms");return d(),G("div",null,[e(C,{class:"!border-none",shadow:"never"},{default:t(()=>[e(g,{content:"\u7528\u6237\u8BE6\u60C5",onBack:o[0]||(o[0]=r=>n.$router.back())})]),_:1}),e(C,{class:"mt-4 !border-none",header:"\u57FA\u672C\u8D44\u6599",shadow:"never"},{default:t(()=>[e(j,{ref_key:"formRef",ref:h,class:"ls-form",model:a(s),"label-width":"120px"},{default:t(()=>[c("div",J,[c("div",K,[L,e(B,{src:a(s).avatar,size:58},null,8,["src"])]),c("div",Q,[X,c("div",Z,[l(" \xA5"+u(a(s).user_money)+" ",1),f((d(),F(p,{type:"primary",link:"",onClick:o[1]||(o[1]=r=>k(a(s).user_money))},{default:t(()=>[l(" \u8C03\u6574 ")]),_:1})),[[_,["user.user/adjustMoney"]]])])])]),e(i,{label:"\u7528\u6237\u6635\u79F0\uFF1A"},{default:t(()=>[l(u(a(s).nickname),1)]),_:1}),e(i,{label:"\u8D26\u53F7\uFF1A"},{default:t(()=>[l(u(a(s).account)+" ",1),f((d(),F(b,{class:"ml-[10px]",onConfirm:o[2]||(o[2]=r=>y(r,"account")),limit:32},{default:t(()=>[e(p,{type:"primary",link:""},{default:t(()=>[e(v,{name:"el-icon-EditPen"})]),_:1})]),_:1})),[[_,["user.user/edit"]]])]),_:1}),e(i,{label:"\u771F\u5B9E\u59D3\u540D\uFF1A"},{default:t(()=>[l(u(a(s).real_name||"-")+" ",1),f((d(),F(b,{class:"ml-[10px]",onConfirm:o[3]||(o[3]=r=>y(r,"real_name")),limit:32},{default:t(()=>[e(p,{type:"primary",link:""},{default:t(()=>[e(v,{name:"el-icon-EditPen"})]),_:1})]),_:1})),[[_,["user.user/edit"]]])]),_:1}),e(i,{label:"\u6027\u522B\uFF1A"},{default:t(()=>[l(u(a(s).sex)+" ",1),f((d(),F(b,{class:"ml-[10px]",type:"select",options:[{label:"\u672A\u77E5",value:0},{label:"\u7537",value:1},{label:"\u5973",value:2}],onConfirm:o[4]||(o[4]=r=>y(r,"sex"))},{default:t(()=>[e(p,{type:"primary",link:""},{default:t(()=>[e(v,{name:"el-icon-EditPen"})]),_:1})]),_:1})),[[_,["user.user/edit"]]])]),_:1}),e(i,{label:"\u8054\u7CFB\u7535\u8BDD\uFF1A"},{default:t(()=>[l(u(a(s).mobile||"-")+" ",1),f((d(),F(b,{class:"ml-[10px]",type:"number",onConfirm:o[5]||(o[5]=r=>y(r,"mobile"))},{default:t(()=>[e(p,{type:"primary",link:""},{default:t(()=>[e(v,{name:"el-icon-EditPen"})]),_:1})]),_:1})),[[_,["user.user/edit"]]])]),_:1}),e(i,{label:"\u6CE8\u518C\u6765\u6E90\uFF1A"},{default:t(()=>[l(u(a(s).channel),1)]),_:1}),e(i,{label:"\u6CE8\u518C\u65F6\u95F4\uFF1A"},{default:t(()=>[l(u(a(s).create_time),1)]),_:1}),e(i,{label:"\u6700\u8FD1\u767B\u5F55\u65F6\u95F4\uFF1A"},{default:t(()=>[l(u(a(s).login_time),1)]),_:1})]),_:1},8,["model"])]),_:1}),e(H,{show:a(m).show,"onUpdate:show":o[6]||(o[6]=r=>a(m).show=r),value:a(m).value,onConfirm:A},null,8,["show","value"])])}}});export{qe as default};
