"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[386],{1386:(t,e,r)=>{r.r(e),r.d(e,{default:()=>a});const o={name:"registro-components-date",mounted:function(){},computed:{year:{get:function(){return this.$store.getters.year},set:function(t){this.$store.dispatch("setYear",t)}},month:{get:function(){return this.$store.getters.month},set:function(t){this.$store.dispatch("setMonth",t)}},day:{get:function(){return this.$store.getters.day},set:function(t){this.$store.dispatch("setDay",t)}}},props:{required:{type:Boolean,default:!1}},data:function(){return{}}};const a=(0,r(1900).Z)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("label",[t._v("Fecha:")]),t._v(" "),r("b-row",[r("b-col",{attrs:{md:"4"}},[r("label",{attrs:{for:"date"}},[t._v("Año:")])]),t._v(" "),r("b-col",{attrs:{md:"8"}},[r("b-form-input",{attrs:{id:"year",required:t.required,placeholder:"Año",autocomplete:"off"},model:{value:t.year,callback:function(e){t.year=e},expression:"year"}})],1)],1),t._v(" "),r("b-row",[r("b-col",{attrs:{md:"4"}},[r("label",{attrs:{for:"month"}},[t._v("Mes:")])]),t._v(" "),r("b-col",{attrs:{md:"8"}},[r("b-form-input",{attrs:{id:"month",required:t.required,placeholder:"Mes",autocomplete:"off"},model:{value:t.month,callback:function(e){t.month=e},expression:"month"}})],1)],1),t._v(" "),r("b-row",[r("b-col",{attrs:{md:"4"}},[r("label",{attrs:{for:"day"}},[t._v("Día:")])]),t._v(" "),r("b-col",{attrs:{md:"8"}},[r("b-form-input",{attrs:{id:"day",required:t.required,placeholder:"Día",autocomplete:"off"},model:{value:t.day,callback:function(e){t.day=e},expression:"day"}})],1)],1)],1)}),[],!1,null,null,null).exports}}]);