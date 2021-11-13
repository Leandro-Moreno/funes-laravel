<template>
    <b-row>
        <b-col md="4">
            <label for="id_number">Número de identificación:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="id_number"
                          :required="required"
                          v-model="id_number"
                          placeholder="Número de identificación"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-id-number",
    mounted() {
    },
    props: {
        id_number: {
            type: String,
            default: "",
        },
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
