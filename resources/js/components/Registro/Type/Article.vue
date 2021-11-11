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
        <registro-autores ref="autores"></registro-autores>
        <registro-autores-institucionales ref="autoresInstitucionales"></registro-autores-institucionales>
        <registro-info-adicional ref="infoAdicional"></registro-info-adicional>
    </div>
</template>
<script>
export default {
    name: "registro-type-article",
}
</script>
