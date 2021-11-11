<template>
    <b-row>
        <b-col md="4">
            <label for="pagerange">Rango de paginas:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="pagerange"
                          required="required"
                          placeholder="Rango de paginas"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-pagerange",
    mounted() {
    },
    props: {
        volume: {
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
