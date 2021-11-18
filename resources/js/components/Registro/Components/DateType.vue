<template>
    <b-row>
        <label>Tipo de Fecha:</label>
        <b-form-radio-group
            v-model="date_type"
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
    name: "registro-components-date-type",
    mounted() {
    },
    computed: {
        date_type: {
            get() {
                return this.$store.getters.dateType
            },
            set(value) {
                this.$store.dispatch('setDateType', value)
            }
        }
    },
    props: {
        required: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            options: [
                { item: 'unspecified', name: 'Sin Especificar' },
                { item: 'published', name: 'Publicación' },
                { item: 'submitted', name: 'Presentación' },
                { item: 'completed', name: 'Terminación' }
            ]
        }
    }
}
</script>
