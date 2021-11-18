<template>
    <b-row>
        <b-col md="4">
            <label for="place_of_pub">Lugar de la Publicación:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="place_of_pub"
                          :required="required"
                          v-model="place_of_pub"
                          placeholder="Lugar de la Publicación"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-place-of-pub",
    mounted() {
    },
    computed: {
        place_of_pub: {
            get() {
                return this.$store.getters.placeOfPub
            },
            set(value) {
                this.$store.dispatch('setPlaceOfPub', value)
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
