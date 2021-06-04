<template>
<div class="card card-body">
<div class="card-title">Autores</div>
<div class="col-sm-12 row">
  <div class="col-sm-4">
  <p>Primer Apellido</p>
  </div>
  <div class="col-sm-4">
  <p>Nombres</p>
  </div>
  <div class="col-sm-4">
  <p>Email</p>
  </div>
</div>
  <div class="col-sm-12 row" v-for="(input, index) in inputs" :key="`campos-${index}`">
      <b-form-input autocomplete="off" v-model="input.valueApellido" class="col-sm-3" :name="`apellido-${index}`" placeholder=""></b-form-input>
      <b-form-input autocomplete="off" v-model="input.valueNombre" class="col-sm-4" :name="`nombre-${index}`" placeholder=""></b-form-input>
      <b-form-input autocomplete="off" v-model="input.valueMail" class="col-sm-3" :name="`mail-${index}`" placeholder="" type="email"></b-form-input>
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
  <b-button v-on:click="addInput">Agregar Autores</b-button>
</div>
</template>
<script>
export default {
    mounted() {
  },
  data (){
    return {
      counter: 1,
      inputs: [{
        valueNombre: "",
        valueApellido: "",
        valueMail: ""
      }]
    }          
  },
  methods: {
    addInput() {
      this.inputs.push({
        valueNombre: "",
        valueApellido: "",
        valueMail: ""
      });
    },
    borrarUsuario: function(index) {
			this.inputs.splice(index,1);
		},
    move: function(from, to){
      this.inputs.splice(to, 0, this.inputs.splice(from, 1)[0]);
    }
  }
}
</script>
