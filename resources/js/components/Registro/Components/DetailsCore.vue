<template>
    <div>
        <div class="card">
            <label class="col-md-12 card-header card-header-black">Título</label>
            <b-form-textarea
                class="card card-body"
                id="title"
                v-model.sync="title"
                placeholder="Ingrese título acá"
                rows="1"
                max-rows="3"
                required
            ></b-form-textarea>
        </div>
        <div class="card">
            <label class="col-md-12 card-header card-header-black">Resumen</label>
            <b-form-textarea
                class="card card-body"
                id="abstract"
                v-model.sync="abstract"
                placeholder="Ingrese su resumen"
                rows="10"
                max-rows="12"
                cols="60"
                required
            ></b-form-textarea>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';

export default {

    name: "registro-core-details",
    mounted() {
    },
    computed: {
        title: {
            get() {
                return this.$store.getters.getTitle
            },
            set(value) {
                this.$store.dispatch('setTitle', value)
            }
        },
        abstract: {
            get() {
                return this.$store.getters.getAbstract
            },
            set(value) {
                this.$store.dispatch('setAbstract', value)
            }
        },
    },
    data() {
        return {
            campos_tipos_registro: null
        }
    },
    props: {},
    methods: {
        updateAbstract: function () {
            this.$store.dispatch('setAbstract', this.abstract);
        },
        updateTitle: function () {
            console.log(evt);
            this.$store.dispatch('setTitle', this.title);
        },

    },
    watch: {
        'title'() {
            this.$emit('update:title', this.title)
        }
    }
}
</script>
