<template>
  <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-error="verror" :useCustomSlot=true v-on:vdropzone-success="obtenerID">
  <div class="dropzone-custom-content">
      <h3 class="dropzone-custom-title font-weight-bold">¡Arrastra y suelta para subir el archivo!</h3>
      <div class="subtitle">...o puede dar click para seleccionar el archivo desde el computador</div>
    </div>
  </vue-dropzone>
</template>
 
<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
  
    export default {
     components: {
        vueDropzone: vue2Dropzone
      },
      data: function () {
        return {
          dropzoneOptions: {
              url: '/subirImagen',
              headers: {
                "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
              },
              addRemoveLinks: true,
              maxFiles: 1
          },
          dropzone: ""
        }
      },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          obtenerID: function(file, response){
            console.log(file);
            console.log(response); 
          },
          verror: function(){
            let file = this.$refs.myVueDropzone.getAcceptedFiles()[0];
            console.log(file);
            this.$refs.myVueDropzone.removeFile(file);
          }
        }
    }
</script>
<style scoped>
  .dropzone-custom-content {
    position: relative;
    top: 50%;
    text-align: center;
  }

  .dropzone-custom-title {
    margin-top: 0;
    color: #00b782;
  }

  .subtitle {
    color: #314b5f;
  }
</style>
