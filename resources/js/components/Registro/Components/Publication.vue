<template>
    <b-row>
        <b-col md="4">
            <label for="publication">Nombre de la revista:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="publication"
                          :required="required"
                          v-model="publication"
                          placeholder="Nombre de la revista"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-publication",
    mounted() {
    },
    computed: {
        publication: {
            get() {
                return this.$store.getters.publication
            },
            set(value) {
                this.$store.dispatch('setPublication', value)
            }
        }
    },
    props: {

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
