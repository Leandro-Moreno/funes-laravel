<template>
    <b-row>
        <label for="thesis_type">Tipo de Tesis:</label>
        <b-form-radio-group
            id="thesis_type"
            v-model="thesis_type"
            :options="options"
            class="mb-3"
            value-field="item"
            text-field="name"
            :required="required"
        ></b-form-radio-group>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-thesis-type",
    mounted() {
    },
    props: {
        thesis_type: {
            type: String,
            default: "",
        },
        required: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            options: [
                { item: 'masters', name: 'Maestría' },
                { item: 'phd', name: 'Doctorado' },
                { item: 'engd', name: 'Especialización' },
                { item: 'other', name: 'Otros' }
            ]
        }
    }
}
</script>
