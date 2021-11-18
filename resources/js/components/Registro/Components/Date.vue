<template>
    <div>
        <label>Fecha:</label>
        <b-row>
            <b-col md="4">
                <label for="date">Año:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="year"
                              v-model="year"
                              :required="required"
                              placeholder="Año"
                              autocomplete="off"
                ></b-form-input>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="4">
                <label for="month">Mes:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="month"
                              v-model="month"
                              :required="required"
                              placeholder="Mes"
                              autocomplete="off"
                ></b-form-input>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="4">
                <label for="day">Día:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="day"
                              v-model="day"
                              :required="required"
                              placeholder="Día"
                              autocomplete="off"
                ></b-form-input>
            </b-col>
        </b-row>
    </div>
</template>
<script>
export default {
    name: "registro-components-date",
    mounted() {
    },
    computed: {
        year: {
            get() {
                return this.$store.getters.year
            },
            set(value) {
                this.$store.dispatch('setYear', value)
            }
        },
        month: {
            get() {
                return this.$store.getters.month
            },
            set(value) {
                this.$store.dispatch('setMonth', value)
            }
        },
        day: {
            get() {
                return this.$store.getters.day
            },
            set(value) {
                this.$store.dispatch('setDay', value)
            }
        },
    },
    props: {
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
