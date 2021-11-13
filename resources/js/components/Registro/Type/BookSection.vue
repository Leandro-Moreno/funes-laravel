<template>
    <div>
        <registro-core-details></registro-core-details>
        <registro-components-refereed required="true"></registro-components-refereed>
        <div class="row card card-body">
            <registro-components-pagerange class="col-md-12" required="true"></registro-components-pagerange>
            <registro-components-book-title class="col-md-12" required="true"></registro-components-book-title>
            <registro-components-volume  required="false"></registro-components-volume>
            <registro-components-book-place-of-pub required="true"></registro-components-book-place-of-pub>
            <registro-components-book-pages  required="false"></registro-components-book-pages>
            <registro-components-publisher class="col-md-12" required="true"></registro-components-publisher>
            <registro-components-id-number class="col-md-12" required="false"></registro-components-id-number>
            <registro-components-series class="col-md-12" required="false"></registro-components-series>
            <registro-components-number class="col-md-12" required="false"></registro-components-number>
            <registro-components-isbn class="col-md-12" required="false"></registro-components-isbn>

        </div>
        <div class="row card-body">
            <registro-components-date class="col-md-6" :required="true"></registro-components-date>
            <registro-components-date-type class="col-md-6"></registro-components-date-type>
        </div>
        <div class="row">
            <registro-components-official-url class="col-md-6"></registro-components-official-url>
        </div>
        <registro-autores ref="autores"></registro-autores>
        <registro-autores-institucionales ref="autoresInstitucionales"></registro-autores-institucionales>
        <registro-info-adicional ref="infoAdicional"></registro-info-adicional>
    </div>
</template>
<script>
export default {
    name: "registro-type-book-section",
}
</script>
