<template>
    <b-row>
        <b-col md="4">
            <label for="volume">Volumen:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="volume"
                          v-model="volume"
                          :required="required"
                          placeholder="Volumen"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-volume",
    mounted() {
    },
    props: {
        volume: {
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
