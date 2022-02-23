(self.webpackChunk=self.webpackChunk||[]).push([[773],{9769:(e,t,n)=>{"use strict";var r=n(8483),o=(n(3402),n(9331)),i=n(538),u=n(629);n(9669);n(6353);i.default.use(u.ZP);var c=new u.ZP.Store({state:{currentRegistro:{id:"",eprintid:"",eprint_status:"inbox",title:"",abstract:"",refereed:!1,official_url:"",volume:"",number:"",issn:"",isbn:"",pagerange:"",type:"",subjects:[],authors:[{given:"",family:"",email:"",authorId:"",results:[],query:""}]},author:{given:"",family:"",email:"",authorId:"",results:[],query:""},type:"type",allRegistros:[]},mutations:{SET_REGISTRO:function(e,t){console.log(this.currentRegistro),console.log(t),e.currentRegistro=t},SET_SUBJECTS:function(e,t){e.currentRegistro.subjects=t},SET_TITLE:function(e,t){e.currentRegistro.title=t},SET_ABSTRACT:function(e,t){e.currentRegistro.abstract=t},SET_IDS:function(e,t){e.currentRegistro.eprintid=t.eprintid,e.currentRegistro.id=t.id},SET_REFEREED:function(e,t){e.currentRegistro.refereed=t},SET_PUBLISHER:function(e,t){e.currentRegistro.publisher=t},SET_OFFICIALURL:function(e,t){e.currentRegistro.official_url=t},SET_VOLUME:function(e,t){e.currentRegistro.volume=t},SET_NUMBER:function(e,t){e.currentRegistro.number=t},SET_PAGERANGE:function(e,t){e.currentRegistro.pagerange=t},SET_YEAR:function(e,t){e.currentRegistro.date_year=t},SET_MONTH:function(e,t){e.currentRegistro.date_month=t},SET_DAY:function(e,t){e.currentRegistro.date_day=t},SET_DATETYPE:function(e,t){e.currentRegistro.date_type=t},SET_PUBLICATION:function(e,t){e.currentRegistro.publication=t},SET_ISSN:function(e,t){e.currentRegistro.issn=t},SET_PLACEOFPUB:function(e,t){e.currentRegistro.place_of_pub=t},SET_PAGES:function(e,t){e.currentRegistro.pages=t},SET_IDNUMBER:function(e,t){e.currentRegistro.id_number=t},SET_SERIES:function(e,t){e.currentRegistro.series=t},SET_ISBN:function(e,t){e.currentRegistro.isbn=t},SET_BOOKTITLE:function(e,t){e.currentRegistro.book_title=t},SET_TYPE:function(e,t){e.currentRegistro.type=t},SET_AUTHORS:function(e,t){e.currentRegistro.authors=t},ADD_AUTHOR:function(e,t){i.default.set(e.author,"email",t.email),i.default.set(e.author,"given",t.given),i.default.set(e.author,"family",t.family),i.default.set(e.author,"authorId",t.authorId),e.currentRegistro.authors.push(e.author)},MOVE_AUTHORS:function(e,t){var n=t.from,r=t.to,o=e.currentRegistro.authors;o.splice(r,0,o.splice(n,1)[0]),e.currentRegistro.authors=o},DELETE_AUTHOR:function(e,t){var n=e.currentRegistro.authors;n.splice(t,1),e.currentRegistro.authors=n}},actions:{setSubjects:function(e,t){(0,e.commit)("SET_SUBJECTS",t)},setAuthors:function(e,t){(0,e.commit)("SET_AUTHORS",t)},addAuthor:function(e,t){e.commit("ADD_AUTHOR",t)},moveAuthors:function(e,t){(0,e.commit)("MOVE_AUTHORS",{from:t.from,to:t.to})},deleteAuthor:function(e,t){(0,e.commit)("DELETE_AUTHOR",t)},setCurrentRegistroAction:function(e,t){var n=e.commit;console.log("action"),console.log(t),n("SET_REGISTRO",t)},setIds:function(e,t){(0,e.commit)("SET_IDS",t)},setTitle:function(e,t){(0,e.commit)("SET_TITLE",t)},setAbstract:function(e,t){(0,e.commit)("SET_ABSTRACT",t)},setRefereed:function(e,t){(0,e.commit)("SET_REFEREED",t)},setPublisher:function(e,t){(0,e.commit)("SET_PUBLISHER",t)},setOfficialUrl:function(e,t){(0,e.commit)("SET_OFFICIALURL",t)},setVolume:function(e,t){(0,e.commit)("SET_VOLUME",t)},setNumber:function(e,t){(0,e.commit)("SET_NUMBER",t)},setPagerange:function(e,t){(0,e.commit)("SET_PAGERANGE",t)},setYear:function(e,t){(0,e.commit)("SET_YEAR",t)},setMonth:function(e,t){(0,e.commit)("SET_MONTH",t)},setDay:function(e,t){(0,e.commit)("SET_DAY",t)},setDateType:function(e,t){(0,e.commit)("SET_DATETYPE",t)},setPublication:function(e,t){(0,e.commit)("SET_PUBLICATION",t)},setIssn:function(e,t){(0,e.commit)("SET_ISSN",t)},setPlaceOfPub:function(e,t){(0,e.commit)("SET_PLACEOFPUB",t)},setPages:function(e,t){(0,e.commit)("SET_PAGES",t)},setIdNumber:function(e,t){(0,e.commit)("SET_IDNUMBER",t)},setSeries:function(e,t){(0,e.commit)("SET_SERIES",t)},setIsbn:function(e,t){(0,e.commit)("SET_ISBN",t)},setBookTitle:function(e,t){(0,e.commit)("SET_BOOKTITLE",t)},setType:function(e,t){(0,e.commit)("SET_TYPE",t)},setRegistro:function(e,t){(0,e.commit)("SET_REGISTRO",t)}},getters:{getSubjects:function(e){return e.currentRegistro.subjects},getRegistro:function(e){return e.currentRegistro},eprintid:function(e){return e.currentRegistro.eprintid},getTitle:function(e){return e.currentRegistro.title},getAbstract:function(e){return e.currentRegistro.abstract},getRefereed:function(e){return e.currentRegistro.refereed},publisher:function(e){return e.currentRegistro.publisher},officialUrl:function(e){return e.currentRegistro.official_url},volume:function(e){return e.currentRegistro.volume},number:function(e){return e.currentRegistro.number},pagerange:function(e){return e.currentRegistro.pagerange},year:function(e){return e.currentRegistro.date_year},month:function(e){return e.currentRegistro.date_month},day:function(e){return e.currentRegistro.date_day},dateType:function(e){return e.currentRegistro.date_type},publication:function(e){return e.currentRegistro.publication},issn:function(e){return e.currentRegistro.issn},placeOfPub:function(e){return e.currentRegistro.place_of_pub},pages:function(e){return e.currentRegistro.pages},idNumber:function(e){return e.currentRegistro.id_number},series:function(e){return e.currentRegistro.series},isbn:function(e){return e.currentRegistro.isbn},bookTitle:function(e){return e.currentRegistro.book_title},authors:function(e){return e.currentRegistro.authors},type:function(e){return console.log(e),e.currentRegistro.type},documents:function(e){return e.currentRegistro.documents}}}),s=n(2433);n(5036);n(9147),i.default.use(s.ZP),i.default.use(o.ZPm),i.default.use(r.X),i.default.use(n(4499)),i.default.component("registro-crear",(function(){return Promise.all([n.e(898),n.e(430)]).then(n.bind(n,5430))})),i.default.component("registro-index",(function(){return Promise.all([n.e(898),n.e(920)]).then(n.bind(n,1920))})),i.default.component("registro-type-article",(function(){return Promise.all([n.e(898),n.e(543)]).then(n.bind(n,543))})),i.default.component("registro-type-book-section",(function(){return Promise.all([n.e(898),n.e(844)]).then(n.bind(n,7844))})),i.default.component("registro-type-edited-book",(function(){return Promise.all([n.e(898),n.e(371)]).then(n.bind(n,8371))})),i.default.component("registro-type-book",(function(){return Promise.all([n.e(898),n.e(239)]).then(n.bind(n,7239))})),i.default.component("registro-results",(function(){return Promise.all([n.e(898),n.e(47)]).then(n.bind(n,8047))})),i.default.component("registro-latest",(function(){return Promise.all([n.e(898),n.e(942)]).then(n.bind(n,3942))})),i.default.component("registro-main",(function(){return Promise.all([n.e(898),n.e(711)]).then(n.bind(n,5711))})),i.default.component("registro-year",(function(){return Promise.all([n.e(898),n.e(236)]).then(n.bind(n,236))})),i.default.component("menu-lateral",(function(){return Promise.all([n.e(898),n.e(937)]).then(n.bind(n,6937))})),i.default.component("registro-core-details",(function(){return Promise.all([n.e(898),n.e(490)]).then(n.bind(n,1490))})),i.default.component("registro-components-publisher",(function(){return Promise.all([n.e(898),n.e(822)]).then(n.bind(n,6822))})),i.default.component("registro-components-refereed",(function(){return Promise.all([n.e(898),n.e(858)]).then(n.bind(n,4858))})),i.default.component("registro-components-official-url",(function(){return Promise.all([n.e(898),n.e(164)]).then(n.bind(n,7164))})),i.default.component("registro-components-volume",(function(){return Promise.all([n.e(898),n.e(747)]).then(n.bind(n,9747))})),i.default.component("registro-components-pagerange",(function(){return Promise.all([n.e(898),n.e(170)]).then(n.bind(n,170))})),i.default.component("registro-components-number",(function(){return Promise.all([n.e(898),n.e(694)]).then(n.bind(n,694))})),i.default.component("registro-components-id-number",(function(){return Promise.all([n.e(898),n.e(408)]).then(n.bind(n,6408))})),i.default.component("registro-components-date",(function(){return Promise.all([n.e(898),n.e(886)]).then(n.bind(n,5886))})),i.default.component("registro-components-date-type",(function(){return Promise.all([n.e(898),n.e(321)]).then(n.bind(n,2321))})),i.default.component("registro-components-publication",(function(){return Promise.all([n.e(898),n.e(306)]).then(n.bind(n,3306))})),i.default.component("registro-components-issn",(function(){return Promise.all([n.e(898),n.e(914)]).then(n.bind(n,1914))})),i.default.component("registro-components-isbn",(function(){return Promise.all([n.e(898),n.e(892)]).then(n.bind(n,9892))})),i.default.component("registro-components-book-title",(function(){return Promise.all([n.e(898),n.e(243)]).then(n.bind(n,3243))})),i.default.component("registro-components-place-of-pub",(function(){return Promise.all([n.e(898),n.e(50)]).then(n.bind(n,7050))})),i.default.component("registro-components-pages",(function(){return Promise.all([n.e(898),n.e(875)]).then(n.bind(n,5875))})),i.default.component("registro-components-series",(function(){return Promise.all([n.e(898),n.e(917)]).then(n.bind(n,4917))})),i.default.component("registro-components-thesis-type",(function(){return Promise.all([n.e(898),n.e(147)]).then(n.bind(n,6147))})),i.default.component("registro-components-authors",(function(){return Promise.all([n.e(898),n.e(685)]).then(n.bind(n,685))})),i.default.component("registro-tree",(function(){return Promise.all([n.e(898),n.e(434)]).then(n.bind(n,1434))})),i.default.component("cargar-archivo",(function(){return Promise.all([n.e(898),n.e(731)]).then(n.bind(n,9731))})),i.default.component("pdf-viewer",(function(){return Promise.all([n.e(898),n.e(473)]).then(n.bind(n,3473))})),i.default.component("registro-autores-institucionales",(function(){return Promise.all([n.e(898),n.e(11)]).then(n.bind(n,4011))})),i.default.component("registro-info-adicional",(function(){return Promise.all([n.e(898),n.e(519)]).then(n.bind(n,7519))})),i.default.component("registro-title",(function(){return Promise.all([n.e(898),n.e(222)]).then(n.bind(n,6222))})),i.default.component("header-animated",(function(){return Promise.all([n.e(898),n.e(132)]).then(n.bind(n,3132))})),i.default.component("tree-subject",(function(){return Promise.all([n.e(898),n.e(705)]).then(n.bind(n,3705))})),i.default.component("registro-administrator-index",(function(){return Promise.all([n.e(898),n.e(559)]).then(n.bind(n,1559))}));new i.default({el:"#library",store:c})},9147:(e,t,n)=>{window._=n(6486);try{window.Popper=n(8981).default,window.$=window.jQuery=n(9755),n(3734)}catch(e){}window.axios=n(9669),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},4499:(e,t,n)=>{"use strict";n.r(t),n.d(t,{default:()=>c});var r=n(7757),o=n.n(r);function i(e,t,n,r,o,i,u){try{var c=e[i](u),s=c.value}catch(e){return void n(e)}c.done?t(s):Promise.resolve(s).then(r,o)}function u(e){return function(){var t=this,n=arguments;return new Promise((function(r,o){var u=e.apply(t,n);function c(e){i(u,r,o,c,s,"next",e)}function s(e){i(u,r,o,c,s,"throw",e)}c(void 0)}))}}function c(e){return s.apply(this,arguments)}function s(){return(s=u(o().mark((function e(t){var n;return o().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(n=t.split("/").reverse()[0].match(/^(.*?)\.umd/)[1],console.log(t),!window[n]){e.next=4;break}return e.abrupt("return",window[n]);case 4:return window[n]=new Promise((function(e,r){var o=document.createElement("script");o.async=!0,o.addEventListener("load",(function(){e(window[n])})),o.addEventListener("error",(function(){r(new Error("Error loading ".concat(t)))})),o.src=t,document.head.appendChild(o)})),e.abrupt("return",window[n]);case 6:case"end":return e.stop()}}),e)})))).apply(this,arguments)}},3444:()=>{}},e=>{var t=t=>e(e.s=t);e.O(0,[952,898],(()=>(t(9769),t(3444))));e.O()}]);