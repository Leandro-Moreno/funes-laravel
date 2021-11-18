<template>
    <b-row>
        <b-col md="4">
            <label for="number">ISBN:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="isbn"
                          :required="required"
                          v-model="isbn"
                          placeholder="ISBN"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-isbn",
    mounted() {
    },
    computed: {
        isbn: {
            get() {
                return this.$store.getters.isbn
            },
            set(value) {
                this.$store.dispatch('setIsbn', value)
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
