
<template>
    <div slot="citation" v-html="citation">
        {{citation}}
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

