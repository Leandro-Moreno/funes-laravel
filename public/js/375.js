"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[375],{8375:(e,t,a)=>{a.r(t),a.d(t,{default:()=>i});var o=a(5498);a(2953);const s={mounted:function(){var e=this;this.$refs.wizard.activateAll(),console.log("Creacion de registro montado."),axios.get("/api/tipos-registro").then((function(t){return e.tipos_registro=t.data.tipos_registro}))},components:{FormWizard:o.FormWizard,TabContent:o.TabContent},data:function(){return{picked:"",tipos_registro:null}},props:{wizardTitle:{type:String,default:"Crear Registro"},wizardSubtitle:{type:String,default:"Prueba de titulo"},wizardnextButtonText:{type:String,default:"Siguiente"},stepSize:{type:String,default:"sm",validator:function(e){return-1!==["xs","sm","md","lg"].indexOf(e)}}},methods:{postRegistro:function(){axios.post("/registro",{prueba:"prueba",nombre:this.$refs.detalles.title,resumen:this.$refs.detalles.description,autores:this.$refs.detalles.$refs.autores.inputs,autoresInstitucionales:this.$refs.detalles.$refs.autoresInstitucionales.institucionales,infoAdicional:this.$refs.detalles.$refs.infoAdicional.darInformacionAdicional(),archivoEnviado:this.$refs.cargarArchivo.darArchivoEnviado(),archivoCargado:this.$refs.cargarArchivo.darArchivoCargado(),tipo_de_documento:this.picked}).then((function(e){console.log(e)})).catch((function(e){console.log(e)}))}}};const i=(0,a(1900).Z)(s,(function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"container"},[a("div",{staticClass:"row justify-content-center"},[a("div",{staticClass:"col-md-12"},[a("div",{staticClass:"card"},[a("div",{staticClass:"card-body"},[a("form-wizard",{ref:"wizard",attrs:{"start-index":4,action:"#",title:e.wizardTitle,subtitle:e.wizardSubtitle,nextButtonText:e.wizardnextButtonText,stepSize:e.stepSize,transition:"slide-fade",duration:"60",color:"#167d74"},on:{"on-complete":e.postRegistro}},[a("tab-content",{attrs:{title:"Tipo de Documento"}},e._l(e.tipos_registro,(function(t){return a("div",{attrs:{id:"v-model-radiobutton"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.picked,expression:"picked"}],attrs:{type:"radio",id:t.name},domProps:{value:t.name,checked:e._q(e.picked,t.name)},on:{change:function(a){e.picked=t.name}}}),e._v(" "),a("label",{attrs:{for:t.name}},[e._v(e._s(t.label))]),e._v(" "),a("p",[e._v(e._s(t.description))])])})),0),e._v(" "),a("tab-content",{attrs:{title:"Cargar"}},[a("cargar-archivo",{ref:"cargarArchivo"})],1),e._v(" "),a("tab-content",{attrs:{title:"Detalles"}},[a("registro-detalles",{ref:"detalles"})],1),e._v(" "),a("tab-content",{attrs:{title:"Términos clave"}},[e._v("\n                     Yuhuuu! This seems pretty damn simple\n                   ")]),e._v(" "),a("tab-content",{attrs:{title:"Depositar"}},[a("p",[e._v('Como editor de este elemento, puede moverlo al estado "en revisión" sin tener que resolver los problemas indicados. En dado caso, seleccione Guardar para Más Adelante para corregir estos problemas más tarde.')]),e._v(" "),a("p",[e._v("Para trabajos depositados por su propio autor: Al depositar la colección de archivos y metadatos bibliográficos asociados a este registro, otorgo a Funes el derecho para almacenarlos y ponerlos a disposición pública permanentemente de un modo gratuito y en línea.")]),e._v(" "),a("p",[e._v("Declaro que este material es de mi propiedad intelectual y entiendo que Funes no asume ninguna responsabilidad en caso de que se produzca una violación de derechos de propiedad al distribuir estos archivos o metadatos. (Se insta a todos los autores a destacar sus derechos de autor en la página de título del documento principal de sus registros en Funes.)")]),e._v(" "),a("p",[e._v("Para trabajos depositados por personas distintas a su autor: Por la presente, declaro que la colección de archivos y metadatos bibliográficos asociados al registro que estoy depositando en Funes es de dominio público. Si éste no fuese el caso, acepto totalmente la responsabilidad por cualquier infracción de derechos de autor que conlleve la distribución de estos archivos o metadatos.")]),e._v(" "),a("p",[e._v("Pulsar en el botón de depósito indica que usted está de acuerdo con estos términos.")])])],1)],1)])])])])}),[],!1,null,null,null).exports}}]);
//# sourceMappingURL=375.js.map