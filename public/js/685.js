"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[685],{685:(t,e,n)=>{n.r(e),n.d(e,{default:()=>a});var r=n(7757),s=n.n(r);function o(t,e,n,r,s,o,i){try{var a=t[o](i),u=a.value}catch(t){return void n(t)}a.done?e(u):Promise.resolve(u).then(r,s)}const i={name:"registro-components-authors",mounted:function(){},props:{},computed:{authors:{get:function(){return this.$store.getters.authors},set:function(t){}}},data:function(){return{counter:1,results:[]}},methods:{arrayDiff:function(t,e){for(var n=[],r=t.length>=e.length?t.length:e.length,s=0;s<r;s++)t[s].family==e[s].family&&t[s].email==e[s].email&&t[s].given==e[s].given||n.push(s);return n},pickAuthor:function(t,e){var n=e.searchable,r=this.authors;r[t].query="",r[t].given=n.given,r[t].family=n.family,r[t].email=n.email,r[t].authorId=n.id,r[t].results=[],this.$store.dispatch("setAuthors",r)},onChange:function(t){this.searchAuthors(t)},addInput:function(){this.authors.push({given:"",family:"",email:"",results:[],query:"",authorId:""})},deleteUser:function(t){this.$store.dispatch("deleteAuthor",t)},move:function(t,e){this.$store.dispatch("moveAuthors",{from:t,to:e})},searchAuthors:function(t){var e,n=this;return(e=s().mark((function e(){var r;return s().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:n.authors[t].query=n.authors[t].family+" "+n.authors[t].given+" "+n.authors[t].email,r={query:n.authors[t].query},axios.get("/search/author",{params:r}).then((function(e){n.authors[t].results=e.data})).catch((function(t){}));case 3:case"end":return e.stop()}}),e)})),function(){var t=this,n=arguments;return new Promise((function(r,s){var i=e.apply(t,n);function a(t){o(i,r,s,a,u,"next",t)}function u(t){o(i,r,s,a,u,"throw",t)}a(void 0)}))})()},deleteSearchInputs:function(t){var e=this;setTimeout((function(){return e.authors[t].query=""}),200)}}};const a=(0,n(1900).Z)(i,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"card card-body"},[n("label",{staticClass:"card-title"},[t._v("Autores")]),t._v(" "),t._m(0),t._v(" "),t._l(t.authors,(function(e,r){return n("div",{key:"author-"+r},[n("div",{staticClass:"row col-sm-12"},[n("b-form-input",{staticClass:"col-sm-3",attrs:{autocomplete:"nope",name:"family-"+r,placeholder:""},on:{input:function(e){return t.onChange(r)},blur:function(e){return t.deleteSearchInputs(r)}},model:{value:e.family,callback:function(n){t.$set(e,"family",n)},expression:"input.family"}}),t._v(" "),n("b-form-input",{staticClass:"col-sm-4",attrs:{autocomplete:"nope",name:"given-"+r,placeholder:""},on:{input:function(e){return t.onChange(r)},blur:function(e){return t.deleteSearchInputs(r)}},model:{value:e.given,callback:function(n){t.$set(e,"given",n)},expression:"input.given"}}),t._v(" "),n("b-form-input",{staticClass:"col-sm-3",attrs:{autocomplete:"nope",name:"email-"+r,placeholder:"",type:"email"},on:{input:function(e){return t.onChange(r)},blur:function(e){return t.deleteSearchInputs(r)}},model:{value:e.email,callback:function(n){t.$set(e,"email",n)},expression:"input.email"}}),t._v(" "),n("div",{staticClass:"col-sm-1"},[n("b-icon-arrow-up",{on:{click:function(e){return t.move(r,r-1)}}}),t._v(" "),n("b-icon-arrow-down",{on:{click:function(e){return t.move(r,r+1)}}})],1),t._v(" "),n("div",{staticClass:"col-sm-1"},[n("b-button",{attrs:{size:"sm"},on:{click:function(e){return t.deleteUser(r)}}},[n("b-icon",{attrs:{icon:"trash","aria-hidden":"true"}})],1)],1)],1),t._v(" "),e.results.length>0&&e.query?n("ul",{attrs:{id:"results-"+r}},t._l(e.results.slice(0,10),(function(e){return n("li",{key:e.id,staticClass:"nav-item",on:{click:function(n){return t.pickAuthor(r,e)}}},[n("div",{staticClass:"dropdown-item",domProps:{textContent:t._s(e.title)}})])})),0):t._e()])})),t._v(" "),n("b-button",{on:{click:t.addInput}},[t._v("Agregar Autores")])],2)}),[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"col-sm-12 row"},[n("div",{staticClass:"col-sm-4"},[n("p",[t._v("Primer Apellido")])]),t._v(" "),n("div",{staticClass:"col-sm-4"},[n("p",[t._v("Nombres")])]),t._v(" "),n("div",{staticClass:"col-sm-4"},[n("p",[t._v("Email")])])])}],!1,null,null,null).exports}}]);