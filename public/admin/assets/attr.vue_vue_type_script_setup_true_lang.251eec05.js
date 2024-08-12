import{V as P,D as j,C as L,t as M,w as Q,F as R}from"./element-plus.f96e9a80.js";import{_ as W}from"./index.8815d874.js";import{_ as q}from"./picker.28f15f34.js";import{_ as G}from"./picker.a6dda4da.js";import{f as x,b as H}from"./index.91627cac.js";import{_ as J}from"./index.vue_vue_type_script_setup_true_lang.a937e9a9.js";import{D as K}from"./vuedraggable.e46ab84b.js";import{d as X,b as V,o as g,c as F,W as e,O as o,u as d,a as t,Q as Y,T as E,U as v,S as Z,V as ee}from"./@vue.4b2a3026.js";const le=t("div",{class:"title flex items-center before:w-[3px] before:h-[14px] before:block before:bg-primary before:mr-2 text-xl font-medium"},[E(" \u5E95\u90E8\u5BFC\u822A\u8BBE\u7F6E "),t("span",{class:"form-tips ml-[10px] !mt-0"}," \u81F3\u5C11\u6DFB\u52A02\u4E2A\u5BFC\u822A\uFF0C\u6700\u591A\u6DFB\u52A05\u4E2A\u5BFC\u822A ")],-1),oe=t("div",{class:"flex items-end mb-4"},[t("div",{class:"text-base text-[#101010] font-medium"},"\u5C55\u793A\u6837\u5F0F")],-1),te=t("div",{class:"flex items-end mb-4"},[t("div",{class:"text-base text-[#101010] font-medium"},"\u83DC\u5355\u8BBE\u7F6E"),t("div",{class:"text-xs text-tx-secondary ml-2"}," \u5EFA\u8BAE\u56FE\u7247\u5C3A\u5BF8\uFF1A100px*100px ")],-1),se={class:"mb-[18px] max-w-[400px]"},ae={class:"bg-fill-light w-full p-4 mt-4"},ue={class:"upload-btn w-[60px] h-[60px]"},ne=t("span",{class:"text-xs leading-5"}," \u672A\u9009\u4E2D ",-1),de={class:"upload-btn w-[60px] h-[60px]"},me=t("span",{class:"text-xs leading-5"}," \u9009\u4E2D ",-1),ce={class:"flex-1 flex items-center"},ie={class:"drag-move cursor-move ml-auto"},re={key:0,class:"mt-4"},r=5,_=2,Fe=X({__name:"attr",props:{modelValue:{type:Object,default:()=>({list:[],style:{}})}},emits:["update:modelValue"],setup(A,{emit:C}){const w=A,B=C,a=V({get(){return w.modelValue},set(s){B("update:modelValue",s)}}),D=V(()=>{var s;return((s=a.value.list)==null?void 0:s.filter(u=>u.is_show=="1"))||[]}),y=()=>{var s;((s=a.value.list)==null?void 0:s.length)<r?a.value.list.push({name:"",selected:"",unselected:"",is_show:1,link:{}}):x.msgError(`\u6700\u591A\u6DFB\u52A0${r}\u4E2A`)},k=s=>{var u;if(((u=a.value.list)==null?void 0:u.length)<=_)return x.msgError(`\u6700\u5C11\u4FDD\u7559${_}\u4E2A`);a.value.list.splice(s,1)},U=s=>s.relatedContext.index!=0,$=s=>{if(D.value.length<_)return s.is_show=1,x.msgError(`\u6700\u5C11\u663E\u793A${_}\u4E2A`)};return(s,u)=>{const p=P,b=J,m=j,f=H,h=G,z=L,N=q,S=M,T=W,I=Q,O=R;return g(),F(ee,null,[e(p,{shadow:"never",class:"!border-none flex"},{default:o(()=>[le]),_:1}),e(O,{"label-width":"70px"},{default:o(()=>[e(p,{shadow:"never",class:"!border-none flex mt-2"},{default:o(()=>[oe,e(m,{label:"\u9ED8\u8BA4\u989C\u8272"},{default:o(()=>[e(b,{class:"max-w-[400px]",modelValue:d(a).style.default_color,"onUpdate:modelValue":u[0]||(u[0]=c=>d(a).style.default_color=c),"default-color":"#999999"},null,8,["modelValue"])]),_:1}),e(m,{label:"\u9009\u4E2D\u989C\u8272",style:{"margin-bottom":"0"}},{default:o(()=>[e(b,{class:"max-w-[400px]",modelValue:d(a).style.selected_color,"onUpdate:modelValue":u[1]||(u[1]=c=>d(a).style.selected_color=c),"default-color":"#4173ff"},null,8,["modelValue"])]),_:1})]),_:1}),e(p,{shadow:"never",class:"!border-none flex mt-2"},{default:o(()=>{var c;return[te,t("div",se,[e(d(K),{class:"draggable",modelValue:d(a).list,"onUpdate:modelValue":u[2]||(u[2]=l=>d(a).list=l),animation:"300",draggable:".draggable",handle:".drag-move",move:U},{item:o(({element:l,index:i})=>[e(T,{onClose:n=>k(i),class:Y(["max-w-[400px]",{draggable:i!=0}]),"show-close":i!==0},{default:o(()=>[t("div",ae,[e(m,{label:"\u5BFC\u822A\u56FE\u6807"},{default:o(()=>[e(h,{modelValue:l.unselected,"onUpdate:modelValue":n=>l.unselected=n,"upload-class":"bg-body","exclude-domain":"",size:"60px"},{upload:o(()=>[t("div",ue,[e(f,{name:"el-icon-Plus",size:16}),ne])]),_:2},1032,["modelValue","onUpdate:modelValue"]),e(h,{modelValue:l.selected,"onUpdate:modelValue":n=>l.selected=n,"exclude-domain":"","upload-class":"bg-body",size:"60px"},{upload:o(()=>[t("div",de,[e(f,{name:"el-icon-Plus",size:16}),me])]),_:2},1032,["modelValue","onUpdate:modelValue"])]),_:2},1024),e(m,{label:"\u5BFC\u822A\u540D\u79F0"},{default:o(()=>[e(z,{modelValue:l.name,"onUpdate:modelValue":n=>l.name=n,placeholder:"\u8BF7\u8F93\u5165\u540D\u79F0"},null,8,["modelValue","onUpdate:modelValue"])]),_:2},1024),e(m,{label:"\u94FE\u63A5\u5730\u5740"},{default:o(()=>[e(N,{"is-tab":!0,disabled:i===0,modelValue:l.link,"onUpdate:modelValue":n=>l.link=n},null,8,["disabled","modelValue","onUpdate:modelValue"])]),_:2},1024),e(m,{label:"\u662F\u5426\u663E\u793A"},{default:o(()=>[t("div",ce,[e(S,{disabled:i==0,modelValue:l.is_show,"onUpdate:modelValue":n=>l.is_show=n,"active-value":1,"inactive-value":0,onChange:n=>$(l)},null,8,["disabled","modelValue","onUpdate:modelValue","onChange"]),t("div",ie,[e(f,{name:"el-icon-Rank",size:"18"})])])]),_:2},1024)])]),_:2},1032,["onClose","show-close","class"])]),_:1},8,["modelValue"])]),((c=d(a).list)==null?void 0:c.length)<r?(g(),F("div",re,[e(I,{class:"w-full",type:"primary",onClick:y},{default:o(()=>{var l;return[E(" \u6DFB\u52A0\u5BFC\u822A "+v((l=d(a).list)==null?void 0:l.length)+" / "+v(r),1)]}),_:1})])):Z("",!0)]}),_:1})]),_:1})],64)}}});export{Fe as _};
