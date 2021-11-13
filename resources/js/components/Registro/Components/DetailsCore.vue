<template>
    <div>
        <div class="card">
            <label class="col-md-12 card-header card-header-black">Título</label>
            <b-form-textarea
                class="card card-body"
                id="title"
                v-model="title"
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
                v-model="abstract"
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
export default {
    name: "registro-core-details",
    mounted() {
    },
    data (){
        return {
            campos_tipos_registro: null
        }
    },
    props: {
        title: {
            type: String,
            default: "",
        },
        abstract: {
            type: String,
            default: "",
        }
    },
}
</script>
