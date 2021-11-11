<template>
    <div class="card">
        <label class="col-md-12 card-header card-header-primary">Publisher</label>
        <b-form-input
            v-model="publisher"
            placeholder="Publisher"
        >
        </b-form-input>
    </div>
</template>
<script>
export default {
    name: "registro-components-publisher",
    mounted() {
    },
    props: {
        publisher: {
            type: String,
            default: "",
        }
    },
    data() {
        return {}
    }
}
</script>
