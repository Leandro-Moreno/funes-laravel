<template>
    <b-row>
        <b-col md="4">
            <label for="book_title">Título del libro:</label>
        </b-col>
        <b-col md="12">
            <b-form-input id="book_title"
                          v-model="book_title"
                          :required="required"
                          placeholder="Título del libro"></b-form-input>
        </b-col>
    </b-row>

</template>
<script>
export default {
    name: "registro-components-book-title",
    mounted() {
    },
    computed: {
        book_title: {
            get() {
                return this.$store.getters.bookTitle
            },
            set(value) {
                this.$store.dispatch('setBookTitle', value)
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
        return {}
    }
}
</script>
