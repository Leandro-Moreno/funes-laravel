<template>
    <vue-pdf-app style="height: 100vh;" :pdf="pdfUrl"></vue-pdf-app>
</template>

<script>
import VuePdfApp from "vue-pdf-app";
import "vue-pdf-app/dist/icons/main.css";

export default {
    name: "pdf-viewer",
    created(){
        console.log(this.pdfUrl);
        console.log("leandro")
    },
    props: ['pdfUrl'],
    components: {
        VuePdfApp,
    },
    data() {
        return {
        }
    }
}
</script>
