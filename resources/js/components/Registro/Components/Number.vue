<template>
    <b-row>
        <b-col md="4">
            <label for="number">Número:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="number"
                          :required="required"
                          placeholder="Numero"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-number",
    mounted() {
    },
    props: {
        number: {
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
