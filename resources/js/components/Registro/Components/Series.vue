<template>
    <b-row>
        <b-col md="4">
            <label for="series">Nombre de la Serie:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="series"
                          :required="required"
                          v-model="series"
                          placeholder="Nombre de la Serie"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-series",
    mounted() {
    },
    props: {
        series: {
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
