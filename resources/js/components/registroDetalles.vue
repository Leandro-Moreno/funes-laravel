<template>
<div>
  <div class="card card-body">
      <label class="col-md-12" >Título</label>
        <b-form-textarea
      id="title"
      v-model="title"
      placeholder="Ingrese título acá"
      rows="1"
      max-rows="3"
      required
    ></b-form-textarea>
        <p>Descripción</p>
    </div>
    <div>
        <label class="col-md-12" >Resumen</label>
          <b-form-textarea
        id="textarea"
        v-model="description"
        placeholder=""
        rows="10"
        max-rows="12"
        cols="60"
        required
      ></b-form-textarea>
          <p>Descripción</p>
      </div>
      <registro-autores></registro-autores>
      <registro-autores-institucionales></registro-autores-institucionales>
      
</div>
</template>
<script>
export default {
    mounted() {
  },
  data (){
    return {
      campos_tipos_registro: null,
      title: '',
      description: ''
    }          
  }
}
</script>
