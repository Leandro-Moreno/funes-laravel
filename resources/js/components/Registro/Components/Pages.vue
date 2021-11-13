<template>
    <b-row>
        <b-col md="4">
            <label for="pages">Número de páginas:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="pages"
                          :required="required"
                          v-model="pages"
                          placeholder="Número de páginas"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-pages",
    mounted() {
    },
    props: {
        pages: {
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
