<template>
    <b-row>
        <b-col md="4">
            <label for="officialUrl">URL Oficial:</label>
        </b-col>
        <b-col md="8">
            <b-form-input id="officialUrl"
                          :required="required"
                          v-model="officialUrl"
                          placeholder="URL Oficial"></b-form-input>
        </b-col>
    </b-row>
</template>
<script>
export default {
    name: "registro-components-official-url",
    mounted() {
    },
    props: {
        officialUrl: {
            type: String,
            default: "",
        },
        required:{
            type: Boolean,
            default: false,
        }
    }
}
</script>
