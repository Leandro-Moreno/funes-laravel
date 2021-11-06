"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[894],{8006:(n,e,t)=>{t.d(e,{Z:()=>o});var r=t(4015),i=t.n(r),a=t(3645),A=t.n(a)()(i());A.push([n.id,'@charset "UTF-8";:root{--dark-color:hsl(var(--hue),100%,9%);--light-color:hsl(var(--hue),95%,98%);--base:hsl(var(--hue),95%,50%);--complimentary1:hsl(var(--hue-complimentary1),95%,50%);--complimentary2:hsl(var(--hue-complimentary2),95%,50%);--font-family:"Poppins",system-ui;--bg-gradient:linear-gradient(to bottom,hsl(var(--hue),95%,99%),hsl(var(--hue),95%,84%))}*{box-sizing:border-box;margin:0;padding:0}.featured-content-img:before{background:linear-gradient(1turn,#000,transparent 0,transparent 0)!important}.header-animated{display:block;margin:0;overflow:hidden;padding-bottom:5vh;padding-top:5vh;position:relative}.header-animated:before{background:linear-gradient(1turn,#f7f7f7,hsla(0,0%,97%,0) 90%,#f7f7f7);bottom:0;content:"";height:100%;left:0;position:absolute;width:100%;z-index:-9}.wrapper-full-page{width:100vw}body{display:grid;max-width:1920px;min-height:100vh;place-items:center}.orb-canvas{height:100%;left:0;overflow-y:hidden;pointer-events:none;position:absolute;top:0;width:100%;z-index:-10}strong{font-weight:600}.featured-content{background:hsla(0,0%,100%,.65);border:3px solid #5450a9;border-radius:1rem;box-shadow:0 .75rem 2rem 0 rgba(0,0,0,.1);z-index:1}.featured-content::first-child{background:hsla(0,0%,100%,.79)!important}.featured-content::first-child:before{\n  /* !importanté */background:linear-gradient(to right,var(--base),var(--complimentary2));\n  /* !importanté */border-radius:inherit;margin:-3px}.featured-content:hover{background:#fff!important;transition:all .3s ease-in-out}.featured-content:hover:before{background:#fff}.overlay{align-items:center;backdrop-filter:blur(19px) saturate(200%);-webkit-backdrop-filter:blur(19px) saturate(200%);background:hsla(0,0%,100%,.69);border:1px solid rgba(209,213,219,.3);border-radius:2rem;box-shadow:0 .75rem 2rem 0 rgba(0,0,0,.1);display:flex;max-height:640px;max-width:1140px;padding:8rem 6rem;width:100%}.overlay__inner{max-width:36rem}.overlay__title{font-size:1.875rem;font-weight:700;letter-spacing:-.025em;line-height:2.75rem;margin-bottom:2rem}.text-gradient{-webkit-text-fill-color:transparent;-moz-text-fill-color:transparent;-webkit-background-clip:text;-moz-background-clip:text;background-image:linear-gradient(45deg,var(--base) 25%,var(--complimentary2))}.overlay__description{font-size:1rem;line-height:1.75rem;margin-bottom:3rem}.overlay__btns{display:flex;max-width:30rem;width:100%}.overlay__btn{align-items:center;background:var(--dark-color);border:none;border-radius:.5rem;color:var(--light-color);display:flex;font-size:.875rem;font-weight:600;height:2.5rem;justify-content:center;outline-color:hsl(var(--hue),95%,50%);transition:transform .15s ease;width:50%}.overlay__btn:hover{cursor:pointer;transform:scale(1.05)}.overlay__btn--transparent{background:transparent;border-width:2px;border:2px solid var(--dark-color);color:var(--dark-color);margin-right:.75rem}.overlay__btn-emoji{margin-left:.375rem}a{align-items:center;color:var(--dark-color);display:flex;height:100%;justify-content:center;text-decoration:none;width:100%}@media (prefers-contrast:high){.orb-canvas{display:none}}@media only screen and (max-width:1140px){.overlay{padding:8rem 4rem}}@media only screen and (max-width:840px){.featured-content{margin:10px 0}.featured-content::first{margin:0}.featured-content-img{height:80px}.overlay{height:auto;padding:4rem}.overlay__title{font-size:1.25rem;line-height:2rem;margin-bottom:1.5rem}.overlay__description{font-size:.875rem;line-height:1.5rem;margin-bottom:2.5rem}}@media only screen and (max-width:600px){.overlay{padding:1.5rem}.overlay__btns{flex-wrap:wrap}.overlay__btn{font-size:.75rem;margin-right:0;width:100%}.overlay__btn:first-child{margin-bottom:1rem}}',"",{version:3,sources:["webpack://./resources/js/components/header.vue"],names:[],mappings:"AAyYQ,gBAnTR,CAsOA,MACI,oCAAA,CACA,qCAAA,CACA,8BAAA,CACA,uDAAA,CACA,uDAAA,CAEA,iCAAA,CAEA,wFAxTJ,CA+TA,EAGI,qBAAA,CAFA,QAAA,CACA,SA3TJ,CA8TA,6BACI,4EA3TJ,CA8TA,iBAII,aAAA,CAHA,QAAA,CAIA,eAAA,CAHA,kBAAA,CACA,eAAA,CAGA,iBA3TJ,CA4TI,wBAQI,sEAAA,CANA,QAAA,CADA,UAAA,CAIA,WAAA,CAFA,MAAA,CAIA,iBAAA,CAHA,UAAA,CAEA,UAxTR,CA8TA,mBACI,WA3TJ,CA8TA,KAGI,YAAA,CAFA,gBAAA,CACA,gBAAA,CAEA,kBA3TJ,CA8TA,YAKI,WAAA,CAFA,MAAA,CAIA,iBAAA,CADA,mBAAA,CALA,iBAAA,CACA,KAAA,CAEA,UAAA,CAIA,WA3TJ,CA8TA,OACI,eA3TJ,CA6TA,kBACI,8BAAA,CAGA,wBAAA,CADA,kBAAA,CADA,yCAAA,CAGA,SA1TJ,CA2TI,+BACI,wCAzTR,CA0TQ;EAE4B,gBAAA,CACxB,sEAAA;EAFc,gBAAA,CACd,qBAAA,CADA,WApTZ,CAyTI,wBACI,yBAAA,CACA,8BAvTR,CAwTQ,+BACI,eAtTZ,CA2TA,SAMI,kBAAA,CACA,yCAAA,CACA,iDAAA,CACA,8BAAA,CACA,qCAAA,CAKA,kBAAA,CADA,yCAAA,CATA,YAAA,CAFA,gBAAA,CADA,gBAAA,CAEA,iBAAA,CAHA,UA7SJ,CA+TA,gBACI,eA5TJ,CA+TA,gBACI,kBAAA,CAEA,eAAA,CACA,sBAAA,CAFA,mBAAA,CAGA,kBA5TJ,CA+TA,eAOI,mCAAA,CAEA,gCAAA,CAHA,4BAAA,CAEA,yBAAA,CAPA,6EAxTJ,CAmUA,sBACI,cAAA,CACA,mBAAA,CACA,kBAhUJ,CAmUA,eAGI,YAAA,CADA,eAAA,CADA,UA9TJ,CAmUA,cAKI,kBAAA,CAIA,4BAAA,CACA,WAAA,CACA,mBAAA,CAHA,wBAAA,CALA,YAAA,CAGA,iBAAA,CACA,eAAA,CALA,aAAA,CAEA,sBAAA,CASA,qCAAA,CADA,8BAAA,CAXA,SApTJ,CAmUA,oBAEI,cAAA,CADA,qBA/TJ,CAmUA,2BACI,sBAAA,CAEA,gBAAA,CACA,kCAAA,CAFA,uBAAA,CAGA,mBAhUJ,CAmUA,oBACI,mBAhUJ,CAmUA,EAOI,kBAAA,CALA,uBAAA,CAGA,YAAA,CADA,WAAA,CAEA,sBAAA,CALA,oBAAA,CAEA,UA5TJ,CAoUA,+BACI,YACI,YAhUN,CACF,CAmUA,0CACI,SACI,iBAjUN,CACF,CAoUA,yCAII,kBACI,aArUN,CAsUM,yBACI,QApUV,CAuUE,sBACI,WApUN,CAsUE,SAEI,WAAA,CADA,YAlUN,CAsUE,gBACI,iBAAA,CACA,gBAAA,CACA,oBAnUN,CAsUE,sBACI,iBAAA,CACA,kBAAA,CACA,oBAnUN,CACF,CAsUA,yCACI,SACI,cApUN,CAuUE,eACI,cApUN,CAuUE,cAEI,gBAAA,CACA,cAAA,CAFA,UAlUN,CAuUE,0BACI,kBApUN,CACF",sourcesContent:['\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n:root {\n    --dark-color: hsl(var(--hue), 100%, 9%);\n    --light-color: hsl(var(--hue), 95%, 98%);\n    --base: hsl(var(--hue), 95%, 50%);\n    --complimentary1: hsl(var(--hue-complimentary1), 95%, 50%);\n    --complimentary2: hsl(var(--hue-complimentary2), 95%, 50%);\n\n    --font-family: "Poppins", system-ui;\n\n    --bg-gradient: linear-gradient(\n        to bottom,\n        hsl(var(--hue), 95%, 99%),\n        hsl(var(--hue), 95%, 84%)\n    );\n}\n\n* {\n    margin: 0;\n    padding: 0;\n    box-sizing: border-box;\n}\n.featured-content-img::before{\n    background: linear-gradient(\n            360deg, black 0%, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 0%)!important;\n}\n.header-animated{\n    margin: 0;\n    padding-bottom: 5vh;\n    padding-top: 5vh;\n    display: block;\n    overflow: hidden;\n    position: relative;\n    &::before {\n        content: "";\n        bottom: 0;\n        left: 0;\n        width: 100%;\n        height: 100%;\n        z-index: -9;\n        position: absolute;\n        background: linear-gradient(\n                360deg, rgba(247, 247, 247, 1), rgba(247, 247, 247, 0) 90%, rgba(247, 247, 247, 1) 100%);\n    }\n}\n.wrapper-full-page{\n    width: 100vw;\n}\n\nbody {\n    max-width: 1920px;\n    min-height: 100vh;\n    display: grid;\n    place-items: center;\n}\n\n.orb-canvas {\n    position: absolute;\n    top: 0;\n    left: 0;\n    width: 100%;\n    height: 100%;\n    pointer-events: none;\n    overflow-y:hidden;\n    z-index: -10;\n}\n\nstrong {\n    font-weight: 600;\n}\n.featured-content{\n    background: rgba(255, 255, 255, 0.65);\n    box-shadow: 0 0.75rem 2rem 0 rgba(0, 0, 0, 0.1);\n    border-radius: 1rem;\n    border: 3px solid #5450a9;\n    z-index: 1;\n    &::first-child{\n        background: rgba(255, 255, 255, 0.79) !important;\n        &::before {\n            margin: -3px; /* !importanté */\n            border-radius: inherit; /* !importanté */\n            background: linear-gradient(to right, var(--base), var(--complimentary2));\n        }\n    }\n    &:hover{\n        background: rgba(255, 255, 255, 1)!important;\n        transition: all 0.3s ease-in-out;\n        &::before{\n            background: white;\n        }\n    }\n}\n\n.overlay {\n    width: 100%;\n    max-width: 1140px;\n    max-height: 640px;\n    padding: 8rem 6rem;\n    display: flex;\n    align-items: center;\n    backdrop-filter: blur(19px) saturate(200%);\n    -webkit-backdrop-filter: blur(19px) saturate(200%);\n    background: rgba(255, 255, 255, 0.69);\n    border: 1px solid rgba(209, 213, 219, 0.3);\n\n\n    //background: rgba(255, 255, 255, 0.375);\n    box-shadow: 0 0.75rem 2rem 0 rgba(0, 0, 0, 0.1);\n    border-radius: 2rem;\n    //border: 1px solid rgba(255, 255, 255, 0.125);\n}\n\n.overlay__inner {\n    max-width: 36rem;\n}\n\n.overlay__title {\n    font-size: 1.875rem;\n    line-height: 2.75rem;\n    font-weight: 700;\n    letter-spacing: -0.025em;\n    margin-bottom: 2rem;\n}\n\n.text-gradient {\n    background-image: linear-gradient(\n        45deg,\n        var(--base) 25%,\n        var(--complimentary2)\n    );\n    -webkit-background-clip: text;\n    -webkit-text-fill-color: transparent;\n    -moz-background-clip: text;\n    -moz-text-fill-color: transparent;\n}\n\n.overlay__description {\n    font-size: 1rem;\n    line-height: 1.75rem;\n    margin-bottom: 3rem;\n}\n\n.overlay__btns {\n    width: 100%;\n    max-width: 30rem;\n    display: flex;\n}\n\n.overlay__btn {\n    width: 50%;\n    height: 2.5rem;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n    font-size: 0.875rem;\n    font-weight: 600;\n    color: var(--light-color);\n    background: var(--dark-color);\n    border: none;\n    border-radius: 0.5rem;\n    transition: transform 150ms ease;\n    outline-color: hsl(var(--hue), 95%, 50%);\n}\n\n.overlay__btn:hover {\n    transform: scale(1.05);\n    cursor: pointer;\n}\n\n.overlay__btn--transparent {\n    background: transparent;\n    color: var(--dark-color);\n    border: 2px solid var(--dark-color);\n    border-width: 2px;\n    margin-right: 0.75rem;\n}\n\n.overlay__btn-emoji {\n    margin-left: 0.375rem;\n}\n\na {\n    text-decoration: none;\n    color: var(--dark-color);\n    width: 100%;\n    height: 100%;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n}\n\n/* Not too many browser support this yet but it\'s good to add! */\n@media (prefers-contrast: high) {\n    .orb-canvas {\n        display: none;\n    }\n}\n\n@media only screen and (max-width: 1140px) {\n    .overlay {\n        padding: 8rem 4rem;\n    }\n}\n\n@media only screen and (max-width: 840px) {\n    body {\n        //padding: 1.5rem;\n    }\n    .featured-content{\n        margin: 10px 0;\n        &::first{\n            margin: 0;\n        }\n    }\n    .featured-content-img{\n        height: 80px;\n    }\n    .overlay {\n        padding: 4rem;\n        height: auto;\n    }\n\n    .overlay__title {\n        font-size: 1.25rem;\n        line-height: 2rem;\n        margin-bottom: 1.5rem;\n    }\n\n    .overlay__description {\n        font-size: 0.875rem;\n        line-height: 1.5rem;\n        margin-bottom: 2.5rem;\n    }\n}\n\n@media only screen and (max-width: 600px) {\n    .overlay {\n        padding: 1.5rem;\n    }\n\n    .overlay__btns {\n        flex-wrap: wrap;\n    }\n\n    .overlay__btn {\n        width: 100%;\n        font-size: 0.75rem;\n        margin-right: 0;\n    }\n\n    .overlay__btn:first-child {\n        margin-bottom: 1rem;\n    }\n}\n\n'],sourceRoot:""}]);const o=A},5894:(n,e,t)=>{t.r(e),t.d(e,{default:()=>f});var r=t(7976),i=t(8460),a=t(7048),A=t(6119),o=t.n(A),s=t(296),d=t.n(s);function l(n,e){if(!(n instanceof e))throw new TypeError("Cannot call a class as a function")}function h(n,e){for(var t=0;t<e.length;t++){var r=e[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(n,r.key,r)}}function c(n,e,t){return e&&h(n.prototype,e),t&&h(n,t),n}const m={name:"header-animated",mounted:function(){this.init()},props:["pdfUrl"],methods:{init:function(){function n(n,e){return Math.random()*(e-n)+n}function e(n,e,t,r,i){return(n-e)/(t-e)*(i-r)+r}var t=new a.ZP,A=function(){function e(){l(this,e),this.setColors(),this.setCustomProperties()}return c(e,[{key:"setColors",value:function(){this.hue=~~n(160,320),this.complimentaryHue1=this.hue+30,this.complimentaryHue2=this.hue+60,this.lightness=n(20,70),this.saturation=n(20,90),this.baseColor=o()(this.hue,this.saturation,this.lightness),this.complimentaryColor1=o()(this.complimentaryHue1,this.saturation,this.lightness),this.complimentaryColor2=o()(this.complimentaryHue2,this.saturation,this.lightness),this.colorChoices=[this.baseColor,this.complimentaryColor1,this.complimentaryColor2]}},{key:"randomColor",value:function(){return this.colorChoices[~~n(0,this.colorChoices.length)].replace("#","0x")}},{key:"setCustomProperties",value:function(){document.documentElement.style.setProperty("--hue",this.hue),document.documentElement.style.setProperty("--hue-complimentary1",this.complimentaryHue1),document.documentElement.style.setProperty("--hue-complimentary2",this.complimentaryHue2)}}]),e}(),s=function(){function i(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;l(this,i),this.bounds=this.setBounds(),this.x=n(this.bounds.x.min,this.bounds.x.max),this.y=n(this.bounds.y.min,this.bounds.y.max),this.scale=1,this.fill=t,this.radius=n(window.innerHeight/2,window.innerHeight/6),this.xOff=n(0,1e3),this.yOff=n(0,1e3),this.inc=.002,this.graphics=new r.TCu,this.graphics.alpha=.825,window.addEventListener("resize",d()((function(){e.bounds=e.setBounds()}),120))}return c(i,[{key:"setBounds",value:function(){var e=window.innerWidth<1e3?window.innerWidth/3.5:window.innerWidth/5.5,t=window.innerWidth/n(1,5),r=window.innerWidth<1e3?window.innerHeight:window.innerHeight/n(1,1.6);return{x:{min:t-e,max:t+e},y:{min:r-e,max:r+e}}}},{key:"update",value:function(){var n=t.noise2D(this.xOff,this.xOff),r=t.noise2D(this.yOff,this.yOff),i=t.noise2D(this.xOff,this.yOff);this.x=e(n,-1,1,this.bounds.x.min,this.bounds.x.max),this.y=e(r,-1,1,this.bounds.y.min,this.bounds.y.max),this.scale=e(i,-2,2,.5,1),this.xOff+=this.inc,this.yOff+=this.inc}},{key:"render",value:function(){this.graphics.x=this.x,this.graphics.y=this.y,this.graphics.scale.set(this.scale),this.graphics.clear(),this.graphics.beginFill(this.fill),this.graphics.drawCircle(0,0,this.radius),this.graphics.endFill()}}]),i}(),h=new r.MxU({view:document.querySelector(".orb-canvas"),resizeTo:window,transparent:!0}),m=new A;h.stage.filters=[new i.p(2,10,!0)];for(var C=[],u=0;u<15;u++){var g=new s(m.randomColor());h.stage.addChild(g.graphics),C.push(g)}window.matchMedia("(prefers-reduced-motion: reduce)").matches?C.forEach((function(n){n.update(),n.render()})):h.ticker.add((function(){C.forEach((function(n){n.update(),n.render()}))}))}}};var C=t(3379),u=t.n(C),g=t(8006),p={insert:"head",singleton:!1};u()(g.Z,p);g.Z.locals;const f=(0,t(1900).Z)(m,(function(){var n=this,e=n.$createElement;n._self._c;return n._m(0)}),[function(){var n=this,e=n.$createElement,t=n._self._c||e;return t("div",{staticClass:"header-animated d-flex justify-content-center"},[t("canvas",{staticClass:"orb-canvas"}),n._v(" "),t("div",{staticClass:"container"},[t("div",{staticClass:"featured-grid"},[t("a",{staticClass:"featured-content featured-content-text featured-content-text-gradient"},[t("div",{staticClass:"featured-content-text-span"},[t("p",{staticClass:"main"},[n._v("FUNES")]),n._v(" "),t("p",{staticClass:"phrase"},[n._v("Repositorio Digital de Documentos de Educación Matemática")]),n._v(" "),t("div",{staticClass:"featured-content-text-span-second"},[t("p",{staticClass:"phrase phrase-second text-gradient"},[n._v("Contamos con 20.500 documentos")]),n._v(" "),t("p",{staticClass:"phrase phrase-second text-gradient"},[n._v("4500 usuarios")]),n._v(" "),t("div",{staticClass:"border-top my-3"}),n._v(" "),t("p",{staticClass:"phrase phrase-second"},[n._v("Somos el 5 repositorio en Colombia")])])])]),n._v(" "),t("a",{staticClass:"featured-content",attrs:{href:"./latest"}},[t("div",{staticClass:"featured-content-img"}),n._v(" "),t("div",{staticClass:"featured-content-info"},[t("h3",{staticClass:"title title-white"},[n._v("\n                        Registros recientes\n                    ")])])]),n._v(" "),t("a",{staticClass:"featured-content",attrs:{href:""}},[t("div",{staticClass:"featured-content-img"}),n._v(" "),t("div",{staticClass:"featured-content-info"},[t("h3",{staticClass:"title title-white"},[n._v("\n                        Búsqueda Avanzada\n                    ")])])]),n._v(" "),t("a",{staticClass:"featured-content",attrs:{href:"./subject"}},[t("div",{staticClass:"featured-content-img"}),n._v(" "),t("div",{staticClass:"featured-content-info"},[t("h3",{staticClass:"title title-white"},[n._v("\n                        Términos Claves\n                    ")])])]),n._v(" "),t("a",{staticClass:"featured-content",attrs:{href:"./about-us"}},[t("div",{staticClass:"featured-content-img"}),n._v(" "),t("div",{staticClass:"featured-content-info"},[t("h3",{staticClass:"title title-white"},[n._v("\n                        Acerca de Funes\n                    ")])])])])])])}],!1,null,null,null).exports}}]);
//# sourceMappingURL=894.js.map