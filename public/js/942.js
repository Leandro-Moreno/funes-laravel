"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[942],{9930:(t,e,a)=>{a.d(e,{Z:()=>s});var n=a(3645),r=a.n(n)()((function(t){return t[1]}));r.push([t.id,".results{padding-left:15px}.results-card{margin:6px;padding:9px}.csl-bib-body{color:#000;font-weight:500}.csl-bib-body:hover{color:#639}",""]);const s=r},3942:(t,e,a)=>{a.r(e),a.d(e,{default:()=>u});var n=a(306);function r(t){return function(t){if(Array.isArray(t))return s(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,e){if(!t)return;if("string"==typeof t)return s(t,e);var a=Object.prototype.toString.call(t).slice(8,-1);"Object"===a&&t.constructor&&(a=t.constructor.name);if("Map"===a||"Set"===a)return Array.from(t);if("Arguments"===a||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(a))return s(t,e)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function s(t,e){(null==e||e>t.length)&&(e=t.length);for(var a=0,n=new Array(e);a<e;a++)n[a]=t[a];return n}const i={name:"registro-latest",props:{},methods:{infiniteHandler:function(){var t=this,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{loaded:function(){},complete:function(){}};console.log("prueba"),console.log(e),axios.get("/api/latest?page=".concat(this.page)).then((function(a){var n;console.log(a),t.data=a.data.registro,t.total=t.data.total,(n=t.latest).push.apply(n,r(t.data.data)),e.loaded(),t.page++}))},manualLoad:function(){this.infiniteHandler()}},data:function(){return{data:null,latest:[],page:1,lastPage:null,total:0}},mounted:function(){console.log(this.$refs),this.infiniteHandler()},components:{InfiniteLoading:a.n(n)()}};var o=a(3379),l=a.n(o),c=a(9930),d={insert:"head",singleton:!1};l()(c.Z,d);c.Z.locals;const u=(0,a(1900).Z)(i,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("section",[a("div",{staticClass:"container"},[a("div",{staticClass:"row justify-content-center"},[a("div",{staticClass:"col-md-4 pt-4 card card-border-primary",staticStyle:{border:"3px solid rebeccapurple"}},[a("div",{staticClass:"card-header"},[a("div",{staticClass:"badge badge-pill badge-black"},[t._v(t._s(t.total)+" registros")])]),t._v(" "),t._m(0)]),t._v(" "),a("div",{staticClass:"col-md-8"},[a("div",{staticClass:"row justify-content-center results"},[t._l(t.latest,(function(t,e){return a("div",{key:e,staticClass:"card results-card"},[a("a",{attrs:{href:t.route}},[a("registro-results",{attrs:{"citation-prop":t}})],1)])})),t._v(" "),a("button",{staticClass:"btn-load-more",on:{click:t.manualLoad}},[t._v("Cargar Más")]),t._v(" "),a("infinite-loading",{ref:"infiniteLoading",attrs:{slot:"append",spinner:"waveDots","force-use-infinite-wrapper":".el-table__body-wrapper",distance:18},on:{infinite:t.infiniteHandler},slot:"append"})],2)])])])])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card-body text-success"},[a("h2",{staticClass:"card-title"},[t._v("Últimos Registros")]),t._v(" "),a("p",{staticClass:"card-text",staticStyle:{color:"rebeccapurple"}},[t._v("Estos son los registros publicados durante el último mes")])])}],!1,null,null,null).exports}}]);