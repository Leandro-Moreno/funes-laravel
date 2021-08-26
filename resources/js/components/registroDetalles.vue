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
        id="description"
        v-model="description"
        placeholder="Ingrese su resumen"
        rows="10"
        max-rows="12"
        cols="60"
        required
      ></b-form-textarea>
          <p>Descripción</p>
      </div>
      <registro-autores ref="autores"></registro-autores>
      <registro-autores-institucionales ref="autoresInstitucionales"></registro-autores-institucionales>
      <registro-info-adicional ref="infoAdicional"></registro-info-adicional>
      
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
