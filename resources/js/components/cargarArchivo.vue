<template>
    <vue-dropzone ref="myVueDropzone"
                  id="dropzone"
                  :options="dropzoneOptions"
                  @vdropzone-error="verror"
                  :useCustomSlot=true
                  v-on:vdropzone-success="obtenerID"
                  v-on:vdropzone-sending="sendingEvent"
    >
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
    name: "cargar-archivo",
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
                addRemoveLinks: true
            },
            dropzone: "",
            file: "",
            response_file: ""
        }
    },
    props: ['registro'],
    mounted() {
    },
    methods: {
        obtenerID: function (file, response) {
            this.file = file;
            this.registro = response.registro;
            this.$emit('updateregistro', response.registro);
            this.response_file = response.file_name_temp;
        },
        verror: function () {
            let file = this.$refs.myVueDropzone.getAcceptedFiles()[0];
            this.$refs.myVueDropzone.removeFile(file);
        },
        darArchivoCargado: function () {
            return {};
        },
        darArchivoEnviado: function () {
            return {
                file: this.file,
                response_file: this.response_file
            };
        },
        sendingEvent: function (file, xhr, formData) {
            formData.append('id', this.registro.eprintid);
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
    color: #167d74;
}

.subtitle {
    color: #314b5f;
}
</style>
