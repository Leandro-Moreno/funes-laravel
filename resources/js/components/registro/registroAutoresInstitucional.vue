<template>
<div class="card card-body">
<div class="card-title">Autores institucionales</div>
<div class="col-sm-12 row">
  <div class="col-sm-4">
  <p>Autor</p>
  </div>
</div>
  <div class="col-sm-12 row" v-for="(institucion, index) in institucionales" :key="`campos-${index}`">
      <b-form-input autocomplete="off" v-model="institucion.value" class="col-sm-10" :name="`institucionales-${index}`" placeholder=""></b-form-input>
      <div class="col-sm-1">
        <b-icon-arrow-up @click="move(index,index-1)"></b-icon-arrow-up>
        <b-icon-arrow-down @click="move(index,index+1)"></b-icon-arrow-down>
      </div>
      <div class="col-sm-1">
        <b-button size="sm"  v-on:click="borrarUsuario(index)" class="">
          <b-icon icon="trash" aria-hidden="true"></b-icon>
        </b-button>
      </div>
      
  </div>
  <b-button v-on:click="addinstitucion">Agregar Autores Institucionales</b-button>
</div>
</template>
<script>
export default {
    mounted() {
  },
  data (){
    return {
      counter: 1,
      institucionales: [{
        value: "",
      }]
    }          
  },
  methods: {
    addinstitucion() {
      this.institucionales.push({
        value: ""
      });
    },
    borrarUsuario: function(index) {
			this.institucionales.splice(index,1);
		},
    move: function(from, to){
      this.institucionales.splice(to, 0, this.institucionales.splice(from, 1)[0]);
    }
  }
}
</script>
