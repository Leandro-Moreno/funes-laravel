"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[747],{5183:(e,n,o)=>{o.d(n,{Z:()=>a});var r=o(4015),t=o.n(r),s=o(3645),i=o.n(s)()(t());i.push([e.id,".dropzone-custom-content[data-v-68f7d082]{position:relative;text-align:center;top:50%}.dropzone-custom-title[data-v-68f7d082]{color:#167d74;margin-top:0}.subtitle[data-v-68f7d082]{color:#314b5f}","",{version:3,sources:["webpack://./resources/js/components/cargarArchivo.vue"],names:[],mappings:"AAsEA,0CACA,iBAAA,CAEA,iBAAA,CADA,OAEA,CAEA,wCAEA,aAAA,CADA,YAEA,CAEA,2BACA,aACA",sourcesContent:['<template>\n    <vue-dropzone ref="myVueDropzone"\n                  id="dropzone"\n                  :options="dropzoneOptions"\n                  @vdropzone-error="verror"\n                  :useCustomSlot=true\n                  v-on:vdropzone-success="obtenerID"\n                  v-on:vdropzone-sending="sendingEvent"\n    >\n        <div class="dropzone-custom-content">\n            <h3 class="dropzone-custom-title font-weight-bold">¡Arrastra y suelta para subir el archivo!</h3>\n            <div class="subtitle">...o puede dar click para seleccionar el archivo desde el computador</div>\n        </div>\n    </vue-dropzone>\n</template>\n\n<script>\n\nimport vue2Dropzone from \'vue2-dropzone\'\nimport \'vue2-dropzone/dist/vue2Dropzone.min.css\'\n\nexport default {\n    name: "cargar-archivo",\n    components: {\n        vueDropzone: vue2Dropzone\n    },\n    data: function () {\n        return {\n            dropzoneOptions: {\n                url: \'/subirImagen\',\n                headers: {\n                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content\n                },\n                addRemoveLinks: true\n            },\n            dropzone: "",\n            file: "",\n            response_file: ""\n        }\n    },\n    props: [\'registro\'],\n    mounted() {\n    },\n    methods: {\n        obtenerID: function (file, response) {\n            this.file = file;\n            this.registro = response.registro;\n            this.$emit(\'updateregistro\', response.registro);\n            this.response_file = response.file_name_temp;\n        },\n        verror: function () {\n            let file = this.$refs.myVueDropzone.getAcceptedFiles()[0];\n            this.$refs.myVueDropzone.removeFile(file);\n        },\n        darArchivoCargado: function () {\n            return {};\n        },\n        darArchivoEnviado: function () {\n            return {\n                file: this.file,\n                response_file: this.response_file\n            };\n        },\n        sendingEvent: function (file, xhr, formData) {\n            formData.append(\'id\', this.registro.eprintid);\n        }\n    }\n}\n<\/script>\n<style scoped>\n.dropzone-custom-content {\n    position: relative;\n    top: 50%;\n    text-align: center;\n}\n\n.dropzone-custom-title {\n    margin-top: 0;\n    color: #167d74;\n}\n\n.subtitle {\n    color: #314b5f;\n}\n</style>\n'],sourceRoot:""}]);const a=i},9747:(e,n,o)=>{o.r(n),o.d(n,{default:()=>c});var r=o(1485),t=o.n(r);o(5721);const s={name:"cargar-archivo",components:{vueDropzone:t()},data:function(){return{dropzoneOptions:{url:"/subirImagen",headers:{"X-CSRF-TOKEN":document.head.querySelector("[name=csrf-token]").content},addRemoveLinks:!0},dropzone:"",file:"",response_file:""}},props:["registro"],mounted:function(){},methods:{obtenerID:function(e,n){this.file=e,this.registro=n.registro,this.$emit("updateregistro",n.registro),this.response_file=n.file_name_temp},verror:function(){var e=this.$refs.myVueDropzone.getAcceptedFiles()[0];this.$refs.myVueDropzone.removeFile(e)},darArchivoCargado:function(){return{}},darArchivoEnviado:function(){return{file:this.file,response_file:this.response_file}},sendingEvent:function(e,n,o){o.append("id",this.registro.eprintid)}}};var i=o(3379),a=o.n(i),p=o(5183),d={insert:"head",singleton:!1};a()(p.Z,d);p.Z.locals;const c=(0,o(1900).Z)(s,(function(){var e=this,n=e.$createElement,o=e._self._c||n;return o("vue-dropzone",{ref:"myVueDropzone",attrs:{id:"dropzone",options:e.dropzoneOptions,useCustomSlot:!0},on:{"vdropzone-error":e.verror,"vdropzone-success":e.obtenerID,"vdropzone-sending":e.sendingEvent}},[o("div",{staticClass:"dropzone-custom-content"},[o("h3",{staticClass:"dropzone-custom-title font-weight-bold"},[e._v("¡Arrastra y suelta para subir el archivo!")]),e._v(" "),o("div",{staticClass:"subtitle"},[e._v("...o puede dar click para seleccionar el archivo desde el computador")])])])}),[],!1,null,"68f7d082",null).exports}}]);
//# sourceMappingURL=747.js.map