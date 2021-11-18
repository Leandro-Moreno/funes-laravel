<template>
    <b-row>
        <b-col md="4">
            <label for="publisher">Publisher:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="publisher"
                          :required="required"
                          v-model="publisher"
                          placeholder="Publisher"></b-form-input>
        </b-col>
    </b-row>
</template>
<script>
export default {
    name: "registro-components-publisher",
    mounted() {
    },
    computed: {
        publisher: {
            get() {
                return this.$store.getters.publisher
            },
            set(value) {
                this.$store.dispatch('setPublisher', value)
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
