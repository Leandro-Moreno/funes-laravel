<template>
<div class="card card-body">
<label class="card-title">Autores institucionales</label> 
<div class="col-sm-12 row">
  <div class="col-sm-4">
  <p>Autor</p>
  </div>
</div>
  <div class="" v-for="(institucion, index) in institucionales" :key="`campos-${index}`">
    <div class="row col-sm-12">
      <b-form-input autocomplete="off" @input="buscarAutores(index)" @blur="borrarCamposBusqueda(index)" v-model="institucion.value" class="col-sm-10" :name="`institucional-${index}`" placeholder=""></b-form-input>
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
    <ul v-if="institucion.results.length > 0 && institucion.query" :id="`results-${index}`">
        <li @click="elegirResultado(index, result)" class="nav-item" v-for="result in institucion.results.slice(0,10)" :key="result.id">
          <div class="dropdown-item" v-text="result.title"></div>
        </li>
    </ul>  
  </div>
  <b-button v-on:click="addinstitucion">Agregar Autores Institucionales</b-button>
</div>
</template>
<script>
export default {
    mounted() {
  },
  prop: {
  },
  data (){
    return {
      counter: 1,
      institucionales: [{
        value: "",
        results: [],
        query: ""
      }]
    }          
  },
  methods: {
    addinstitucion() {
      this.institucionales.push({
        value: "",
        results: [],
        query: ""
      });
    },
    borrarUsuario: function(index) {
			this.institucionales.splice(index,1);
		},
    move: function(from, to){
      this.institucionales.splice(to, 0, this.institucionales.splice(from, 1)[0]);
    },
    async buscarAutores(index) {
      console.log(index);
      this.institucionales[index].query = this.institucionales[index].value;
      let request = {
        query: this.institucionales[index].query
      };
      axios.get('/api/buscar-autor-institucional', { params: request })
          .then(response => {
            this.institucionales[index].results = response.data;
          })
          .catch(error => {});
      },
      elegirResultado: function(index, input){
        let resultado = input.searchable;
        this.institucionales[index].query = "";
        this.institucionales[index].value = resultado.nombre;
        this.institucionales[index].results = [];
      },
      borrarCamposBusqueda: function(index){
        setTimeout(() => this.institucionales[index].query = "", 500);        
      }
  }
}
</script>
