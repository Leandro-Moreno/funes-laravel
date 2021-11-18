<template>
    <div>
        <registro-core-details></registro-core-details>
        <registro-components-refereed></registro-components-refereed>
        <div class="row">
            <registro-components-publisher class="col-md-6"></registro-components-publisher>
            <registro-components-official-url class="col-md-6"></registro-components-official-url>
        </div>
        <div class="row card card-body">
            <registro-components-volume class="col-md-6" :required="true"></registro-components-volume>
            <registro-components-number class="col-md-6" :required="false"></registro-components-number>
            <registro-components-pagerange class="col-md-6" :required="true"></registro-components-pagerange>
        </div>
        <div class="row card-body">
            <registro-components-date class="col-md-6" :required="true"></registro-components-date>
            <registro-components-date-type class="col-md-6"></registro-components-date-type>
        </div>
        <div class="row card-body">
            <registro-components-publication class="col-md-6" :required="true"></registro-components-publication>
            <registro-components-issn class="col-md-6"></registro-components-issn>
        </div>
        <registro-components-authors ref="autores"></registro-components-authors>
        <registro-autores-institucionales ref="autoresInstitucionales"></registro-autores-institucionales>
        <registro-info-adicional ref="infoAdicional"></registro-info-adicional>
    </div>
</template>
<script>
export default {
    name: "registro-type-article",
    props: {
        title: {
            type: String,
            default: "",
        },
        abstract: {
            type: String,
            default: "",
        }
    },
    methods:{
        onUpdateCoreDetails: function (title, abstract) {
            console.log(title);
            console.log(abstract);
        },
        abstractUpdate: function(abstract){
            console.log(update);
        }
    }
}
</script>
