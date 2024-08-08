import{f as b}from"./links.Byq_3x2e.js";import{R as $,a as y,G as x,b as S}from"./constants.CPpKID74.js";import{C as k}from"./Index.CoGLBdzo.js";import{C as E}from"./Blur.CvHKqkVq.js";import{C as A}from"./Card.D52fee8h.js";import{C as T}from"./Table.JF4U36kH.js";import{_ as R}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as s,o as a,c as C,k as _,l as n,B as r,b as p,C as m,t as h,G as U}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import{C as v}from"./Index.Cf5ujj4F.js";import{R as w}from"./RequiredPlans.BaQ2NBS5.js";const P={components:{CoreAddRedirection:k,CoreBlur:E,CoreCard:A,CoreWpTable:T},props:{noCoreCard:Boolean},data(){return{REDIRECT_TYPES:$,REDIRECT_QUERY_PARAMS:y,strings:{addNewRedirection:this.$t.__("Add New Redirection",this.$td),searchUrls:this.$t.__("Search URLs",this.$td)},bulkOptions:[{label:"",value:""}]}},computed:{columns(){return[{slug:"source_url",label:this.$t.__("Source URL",this.$td)},{slug:"target_url",label:this.$t.__("Target URL",this.$td)},{slug:"hits",label:this.$t.__("Hits",this.$td),width:"97px"},{slug:"type",label:this.$t.__("Type",this.$td),width:"100px"},{slug:"group",label:this.$t.__("Group",this.$td),width:"150px"},{slug:"enabled",label:x.enabled,width:"80px"}]},additionalFilters(){return[{label:this.$t.__("Filter by Group",this.$td),name:"group",options:[{label:this.$t.__("All Groups",this.$td),value:"all"}].concat(S)}]}}},B={class:"aioseo-redirects-blur"};function D(o,g,t,d,e,c){const l=s("core-add-redirection"),i=s("core-blur"),u=s("core-card"),f=s("core-wp-table");return a(),C("div",B,[t.noCoreCard?p("",!0):(a(),_(u,{key:0,slug:"addNewRedirection","header-text":e.strings.addNewRedirection,noSlide:!0},{default:n(()=>[r(i,null,{default:n(()=>[r(l,{type:e.REDIRECT_TYPES[0].value,query:e.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0},null,8,["type","query"])]),_:1})]),_:1},8,["header-text"])),t.noCoreCard?(a(),_(i,{key:1},{default:n(()=>[r(l,{type:e.REDIRECT_TYPES[0].value,query:e.REDIRECT_QUERY_PARAMS[0].value,slash:!0,case:!0},null,8,["type","query"])]),_:1})):p("",!0),r(i,null,{default:n(()=>[r(f,{filters:[],totals:{total:0,pages:0,page:1},columns:c.columns,rows:[],"search-label":e.strings.searchUrls,"bulk-options":e.bulkOptions,"additional-filters":c.additionalFilters},null,8,["columns","search-label","bulk-options","additional-filters"])]),_:1})])}const G=R(P,[["render",D]]),I={setup(){return{licenseStore:b()}},components:{Blur:G,Cta:v,RequiredPlans:w},props:{noCoreCard:Boolean,parentComponentContext:String},data(){return{strings:{ctaButtonText:this.$t.__("Unlock Redirects",this.$td),ctaHeader:this.$t.sprintf(this.$t.__("Redirects is a %1$s Feature",this.$td),"PRO"),serverRedirects:this.$t.__("Fast Server Redirects",this.$td),automaticRedirects:this.$t.__("Automatic Redirects",this.$td),redirectMonitoring:this.$t.__("Redirect Monitoring",this.$td),monitoring404:this.$t.__("404 Monitoring",this.$td),fullSiteRedirects:this.$t.__("Full Site Redirects",this.$td),siteAliases:this.$t.__("Site Aliases",this.$td),redirectsDescription:this.$t.__("Our Redirection Manager lets you easily create and manage redirects for broken links to avoid confusing search engines and users and prevents losing backlinks.",this.$td)}}}};function L(o,g,t,d,e,c){const l=s("blur"),i=s("required-plans"),u=s("cta");return a(),C("div",{class:U({"aioseo-redirects":!0,"core-card":!t.noCoreCard})},[r(l,{noCoreCard:t.noCoreCard},null,8,["noCoreCard"]),r(u,{"cta-link":o.$links.getPricingUrl("redirects","redirects-upsell",t.parentComponentContext?t.parentComponentContext:null),"button-text":e.strings.ctaButtonText,"learn-more-link":o.$links.getUpsellUrl("redirects",t.parentComponentContext?t.parentComponentContext:null,o.$isPro?"pricing":"liteUpgrade"),"feature-list":[e.strings.serverRedirects,e.strings.automaticRedirects,e.strings.redirectMonitoring,e.strings.monitoring404,e.strings.fullSiteRedirects,e.strings.siteAliases],"hide-bonus":!d.licenseStore.isUnlicensed},{"header-text":n(()=>[m(h(e.strings.ctaHeader),1)]),description:n(()=>[r(i,{addon:"aioseo-redirects"}),m(" "+h(e.strings.redirectsDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list","hide-bonus"])],2)}const W=R(I,[["render",L]]);export{W as R};
