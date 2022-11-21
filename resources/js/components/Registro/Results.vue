
<template>
    <div>
    <div slot="citation" v-html="citation">
        {{citation}}
    </div>
        <div class="see_more">Ver más</div>
    </div>
</template>
<script>
const Cite = require('citation-js')
export default {
    name: "registro-results",
    props: {
        citationProp: Object
    },
    data() {
        return {
            citation: null
        }
    },
    methods: {
        printCitationFromJson() {
            let citation = new Cite()
            citation.set(this.citationProp)
            this.citation = citation.format('bibliography', {
                format: 'html',
                template: 'apa',
                lang: 'es-ES'
            })
        }
    },
    mounted() {
        this.printCitationFromJson()
    },
    watch: {
        // citationProp: function(newVal, oldVal) {
        //     this.printCitationFromJson()
        // }
    }
}
</script>
<style>
.see_more{
    font-family: "Source Sans Pro", "Helvetica", "Arial", sans-serif;
    font-weight: 500;

}
</style>

