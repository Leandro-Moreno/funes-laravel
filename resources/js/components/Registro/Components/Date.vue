<template>
    <div>
        <label>Fecha:</label>
        <b-row>
            <b-col md="4">
                <label for="date_year">Año:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="date_year"
                              v-model="date_year"
                              :required="required"
                              placeholder="Año"
                              autocomplete="off"
                ></b-form-input>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="4">
                <label for="date_month">Mes:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="date_month"
                              v-model="date_month"
                              :required="required"
                              placeholder="Mes"
                              autocomplete="off"
                ></b-form-input>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="4">
                <label for="date_day">Día:</label>
            </b-col>
            <b-col md="8">
                <b-form-input id="date_day"
                              v-model="date_day"
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
        date_year: {
            get() {
                return this.$store.getters.year
            },
            set(value) {
                this.$store.dispatch('setdate_year', value)
            }
        },
        date_month: {
            get() {
                return this.$store.getters.month
            },
            set(value) {
                this.$store.dispatch('setdate_month', value)
            }
        },
        date_day: {
            get() {
                return this.$store.getters.day
            },
            set(value) {
                this.$store.dispatch('setdate_day', value)
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
