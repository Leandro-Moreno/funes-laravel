<template>
    <b-row>
        <b-col md="4">
            <label for="issn">ISSN:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="issn"
                          v-model="issn"
                          :required="required"
                          placeholder="ISSN"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-issn",
    mounted() {
    },
    computed: {
        issn: {
            get() {
                return this.$store.getters.issn
            },
            set(value) {
                this.$store.dispatch('setIssn', value)
            }
        }
    },
    props: {
        issn: {
            type: String,
            default: "",
        },
        required: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {}
    }
}
</script>
