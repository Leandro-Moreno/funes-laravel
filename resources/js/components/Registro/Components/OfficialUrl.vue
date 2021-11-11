<template>
    <div class="card">
        <label class="col-md-12 card-header card-header-primary">Publisher</label>
        <b-form-input
            v-model="officialUrl"
            placeholder="Publisher"
            type="url"
        >
        </b-form-input>
    </div>
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
        }
    },
    data() {
        return {}
    }
}
</script>
