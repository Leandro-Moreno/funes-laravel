<template>
    <vue-pdf-app :pdf="pdfUrl"></vue-pdf-app>
</template>

<script>
import VuePdfApp from "vue-pdf-app";
// import this to use default icons for buttons
import "vue-pdf-app/dist/icons/main.css";

export default {
    name: "pdf-viewer",
    created(){
      console.log(this.pdfUrl);
      console.log("leandro")
    },
    props: ['pdfUrl'],
    components: {
        VuePdfApp
    }
};
</script>
