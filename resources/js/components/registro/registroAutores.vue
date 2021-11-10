<template>
    <div class="card card-body">
        <label class="card-title">Autores</label>
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
        <div class="" v-for="(input, index) in inputs" :key="`campos-${index}`">
            <div class="row col-sm-12">
                <b-form-input autocomplete="off" @input="onChange(index)" @blur="borrarCamposBusqueda(index)"
                              v-model="input.valueApellido" class="col-sm-3" :name="`apellido-${index}`"
                              placeholder=""></b-form-input>
                <b-form-input autocomplete="off" @input="onChange(index)" @blur="borrarCamposBusqueda(index)"
                              v-model="input.valueNombre" class="col-sm-4" :name="`nombre-${index}`"
                              placeholder=""></b-form-input>
                <b-form-input autocomplete="off" @input="onChange(index)" @blur="borrarCamposBusqueda(index)"
                              v-model="input.valueMail" class="col-sm-3" :name="`mail-${index}`" placeholder=""
                              type="email"></b-form-input>
                <div class="col-sm-1">
                    <b-icon-arrow-up @click="move(index,index-1)"></b-icon-arrow-up>
                    <b-icon-arrow-down @click="move(index,index+1)"></b-icon-arrow-down>
                </div>
                <div class="col-sm-1">
                    <b-button size="sm" v-on:click="borrarUsuario(index)" class="">
                        <b-icon icon="trash" aria-hidden="true"></b-icon>
                    </b-button>
                </div>
            </div>
            <ul v-if="input.results.length > 0 && input.query" :id="`results-${index}`">
                <li @click="elegirResultado(index, result)" class="nav-item" v-for="result in input.results.slice(0,10)"
                    :key="result.id">
                    <div class="dropdown-item" v-text="result.title"></div>
                </li>
            </ul>
        </div>
        <b-button v-on:click="addInput">Agregar Autores</b-button>
    </div>
</template>
<script>
export default {
    name: 'registro-autores',
    mounted() {
    },
    props: {},
    data() {
        return {
            counter: 1,
            inputs: [{
                valueNombre: "",
                valueApellido: "",
                valueMail: "",
                userId: "",
                results: [],
                query: ""
            }],
            results: []
        }
    },
    watch: {},
    computed: {},
    methods: {
        arrayDiff(a1, a2) {
            var result = [], longerLength = a1.length >= a2.length ? a1.length : a2.length;
            for (let i = 0; i < longerLength; i++) {
                if (a1[i].valueApellido != a2[i].valueApellido || a1[i].valueMail != a2[i].valueMail || a1[i].valueNombre != a2[i].valueNombre) {
                    result.push(i);
                }
            }
            return result;
        },
        elegirResultado: function (index, input) {
            let resultado = input.searchable;
            this.inputs[index].query = "";
            this.inputs[index].valueNombre = resultado.nombre;
            this.inputs[index].valueApellido = resultado.apellido;
            this.inputs[index].valueMail = resultado.email;
            this.inputs[index].userId = resultado.id;
            this.inputs[index].results = [];
        },
        onChange: function (index) {
            this.buscarAutores(index);
        },

        addInput() {
            this.inputs.push({
                valueNombre: "",
                valueApellido: "",
                valueMail: "",
                results: [],
                query: "",
                userId: ""
            });
        },
        borrarUsuario: function (index) {
            this.inputs.splice(index, 1);
        },
        move: function (from, to) {
            this.inputs.splice(to, 0, this.inputs.splice(from, 1)[0]);
        },
        async buscarAutores(index) {
            this.inputs[index].query = this.inputs[index].valueApellido + " " + this.inputs[index].valueNombre + ' ' + this.inputs[index].valueMail;
            let request = {
                query: this.inputs[index].query
            };
            axios.get('/api/buscar-autor', {params: request})
                .then(response => {
                    this.inputs[index].results = response.data;
                })
                .catch(error => {
                });
        },
        borrarCamposBusqueda: function (index) {
            setTimeout(() => this.inputs[index].query = "", 500);
        }
    }
}
</script>
