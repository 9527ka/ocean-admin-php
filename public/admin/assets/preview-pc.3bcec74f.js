import{w as B,a as $}from"./element-plus.f96e9a80.js";import{e as E}from"./index.0a825834.js";import{I as S,v as F,h as R}from"./@element-plus.c80de70c.js";import{d as N,s as z,b as D,o as r,c as p,a as n,S as _,V as I,a7 as P,Q as y,u as e,$ as h,J as q,M as A,R as W,W as s,O as v}from"./@vue.4b2a3026.js";import{d as j}from"./index.91627cac.js";import"./@vueuse.150327d1.js";import"./lodash-es.2b4cc642.js";import"./dayjs.f46d1cd6.js";import"./balanced-match.aa21c01a.js";import"./async-validator.fb49d0f5.js";import"./@ctrl.b082b0c1.js";import"./@popperjs.36402333.js";import"./escape-html.e5dfadb9.js";import"./normalize-wheel-es.8aeb3683.js";import"./attr.c7779d71.js";import"./index.8815d874.js";import"./picker.28f15f34.js";import"./index.ff756fc3.js";import"./picker.a6dda4da.js";import"./index.8fc0f66b.js";import"./index.vue_vue_type_script_setup_true_lang.c8b65c20.js";import"./index.232742b6.js";import"./index.vue_vue_type_script_setup_true_lang.1a989044.js";import"./usePaging.5995a687.js";import"./vue3-video-play.0d206adf.js";import"./vuedraggable.e46ab84b.js";import"./vue.2bbc5ab4.js";import"./sortablejs.b72ab876.js";import"./lodash.d6bb5e00.js";import"./axios.820613cd.js";import"./vue-router.4d1437e2.js";import"./pinia.23f1b180.js";import"./css-color-function.cee2f610.js";import"./color-convert.755d189f.js";import"./color-name.e7a4e1d3.js";import"./ms.564e106c.js";import"./nprogress.acc17954.js";import"./vue-clipboard3.5b3f624f.js";import"./clipboard.53ca536a.js";import"./echarts.004f4e72.js";import"./zrender.b56a9aa5.js";import"./tslib.60310f1a.js";import"./highlight.js.db90315f.js";import"./@highlightjs.c9907823.js";import"./content.vue_vue_type_script_setup_true_lang.ef5256d7.js";import"./decoration-img.eb21d0a0.js";import"./attr.vue_vue_type_script_setup_true_lang.df919f37.js";import"./content.6625a50a.js";import"./attr.vue_vue_type_script_setup_true_lang.fe12a464.js";import"./content.vue_vue_type_script_setup_true_lang.979eff2e.js";import"./attr.vue_vue_type_script_setup_true_lang.1b7a7e04.js";import"./add-nav.vue_vue_type_script_setup_true_lang.3d45aae0.js";import"./content.cf686229.js";import"./attr.vue_vue_type_script_setup_true_lang.4f304943.js";import"./content.vue_vue_type_script_setup_true_lang.17e4503f.js";import"./attr.vue_vue_type_script_setup_true_lang.4da0f83a.js";import"./content.d8c9652b.js";import"./decoration.cb4a0732.js";import"./attr.vue_vue_type_script_setup_true_lang.678b1538.js";import"./index.vue_vue_type_script_setup_true_lang.a937e9a9.js";import"./content.b40301d6.js";import"./attr.a26b9d71.js";import"./content.vue_vue_type_script_setup_true_lang.e34fc8d8.js";import"./attr.vue_vue_type_script_setup_true_lang.e018fe5f.js";import"./content.5c5b5d80.js";import"./attr.vue_vue_type_script_setup_true_lang.f7fa5678.js";import"./content.vue_vue_type_script_setup_true_lang.f11f2aab.js";import"./attr.vue_vue_type_script_setup_true_lang.708aabc9.js";import"./content.421fae16.js";const J={class:"pages-preview"},L={class:"relative flex justify-center h-full mt-5 mx-10"},M=["src"],O={class:"max-w-[1200px] w-full absolute"},Q=["onClick"],T=N({__name:"preview-pc",props:{pageData:{type:Array,default:()=>[]},modelValue:{type:Number,default:0}},emits:["update:modelValue"],setup(a,{emit:b}){const u=z(),C=b,c=D(()=>o=>(o==null?void 0:o.enabled)==0),k=o=>{var l;(l=u.value[o])==null||l.open()},V=o=>{o.enabled!==void 0&&(o.enabled=o.enabled?0:1)},x=(o,l)=>{o.disabled||C("update:modelValue",l)};return(o,l)=>{const f=B,d=$;return r(),p("div",J,[n("div",L,[o.$route.query.url?(r(),p("iframe",{key:0,ref:"previewIframeRef",class:"flex-1 h-full",width:"100%",height:"100%",scrolling:"no",src:o.$route.query.url},null,8,M)):_("",!0),n("div",O,[(r(!0),p(I,null,P(a.pageData,(t,i)=>(r(),p("div",{key:t.id,class:y(["absolute left-0 top-0",{"cursor-pointer":!(t!=null&&t.disabled)}]),onClick:m=>x(t,i)},[n("div",{class:y(["absolute w-full h-full z-[100] border-dashed",{select:i==a.modelValue,"border-[#dcdfe6] border-2":!(t!=null&&t.disabled),hide:e(c)(t.content)}]),style:h(t.styles)},null,6),q(o.$slots,"default",{},()=>{var m;return[(r(),A(W((m=e(E)[t==null?void 0:t.name])==null?void 0:m.content),{content:t.content,styles:t.styles,key:t.id,ref_for:!0,ref_key:"commonComponentRef",ref:u},null,8,["content","styles"]))]},!0),i==a.modelValue?(r(),p("div",{key:0,class:"widget-btns py-[5px]",style:h({top:t.styles.top,left:t.styles.width})},[n("div",null,[s(d,{effect:"dark",content:"\u7F16\u8F91\u7EC4\u4EF6\u5185\u5BB9",placement:"right"},{default:v(()=>[s(f,{class:"py-[5px]",type:"primary",icon:e(S),onClick:m=>k(i)},null,8,["icon","onClick"])]),_:2},1024)]),n("div",null,[s(d,{effect:"dark",content:e(c)(t.content)?"\u663E\u793A":"\u9690\u85CF",placement:"right"},{default:v(()=>[s(f,{class:"py-[5px]",type:"primary",icon:e(c)(t.content)?e(F):e(R),onClick:m=>V(t.content)},null,8,["icon","onClick"])]),_:2},1032,["content"])])],4)):_("",!0)],10,Q))),128))])])])}}});const po=j(T,[["__scopeId","data-v-2b1de70f"]]);export{po as default};
