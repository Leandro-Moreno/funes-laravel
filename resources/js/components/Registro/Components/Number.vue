<template>
    <b-row>
        <b-col md="4">
            <label for="number">Número:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="number"
                          :required="required"
                          v-model="number"
                          placeholder="Número"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-number",
    mounted() {
    },
    computed: {
        publisher: {
            get() {
                return this.$store.getters.number
            },
            set(value) {
                this.$store.dispatch('setNumber', value)
            }
        }
    },
    props: {
        required: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {}
    }
}
</script>
