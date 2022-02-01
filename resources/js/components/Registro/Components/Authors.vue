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
        <div class="" v-for="(input, index) in authors" :key="`author-${index}`">
            <div class="row col-sm-12">
                <b-form-input autocomplete="nope" @input="onChange(index)" @blur="deleteSearchInputs(index)"
                              v-model="input.family" class="col-sm-3" :name="`family-${index}`"
                              placeholder=""></b-form-input>
                <b-form-input autocomplete="nope" @input="onChange(index)" @blur="deleteSearchInputs(index)"
                              v-model="input.given" class="col-sm-4" :name="`given-${index}`"
                              placeholder=""></b-form-input>
                <b-form-input autocomplete="nope" @input="onChange(index)" @blur="deleteSearchInputs(index)"
                              v-model="input.email" class="col-sm-3" :name="`email-${index}`" placeholder=""
                              type="email"></b-form-input>
                <div class="col-sm-1">
                    <b-icon-arrow-up @click="move(index,index-1)"></b-icon-arrow-up>
                    <b-icon-arrow-down @click="move(index,index+1)"></b-icon-arrow-down>
                </div>
                <div class="col-sm-1">
                    <b-button size="sm" v-on:click="deleteUser(index)" class="">
                        <b-icon icon="trash" aria-hidden="true"></b-icon>
                    </b-button>
                </div>
            </div>
            <ul v-if="input.results.length > 0 && input.query" :id="`results-${index}`">
                <li @click="pickAuthor(index, result)" class="nav-item" v-for="result in input.results.slice(0,10)"
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
    name: 'registro-components-authors',
    mounted() {
    },
    props: {},
    computed: {
        authors: {
            get() {
                return this.$store.getters.authors
            },
            set(value) {
                // this.$store.dispatch('setPlaceOfPub', value)
            }
        }
    },
    data() {
        return {
            counter: 1,
            // authors: [{
            //     given: "",
            //     family: "",
            //     email: "",
            //     authorId: "",
            //     results: [],
            //     query: ""
            // }],
            results: []
        }
    },
    methods: {
        arrayDiff(a1, a2) {
            var result = [], longerLength = a1.length >= a2.length ? a1.length : a2.length;
            for (let i = 0; i < longerLength; i++) {
                if (a1[i].family != a2[i].family || a1[i].email != a2[i].email || a1[i].given != a2[i].given) {
                    result.push(i);
                }
            }
            return result;
        },
        pickAuthor: function (index, input) {
            let results = input.searchable;
            let authorsTemp = this.authors;
            authorsTemp[index].query = "";
            authorsTemp[index].given = results.given;
            authorsTemp[index].family = results.family;
            authorsTemp[index].email = results.email;
            authorsTemp[index].authorId = results.id;
            authorsTemp[index].results = [];
            this.$store.dispatch('setAuthors',authorsTemp);
        },
        onChange: function (index) {
            this.searchAuthors(index);
        },

        addInput() {
            this.authors.push({
                given: "",
                family: "",
                email: "",
                results: [],
                query: "",
                authorId: ""
            });
        },
        deleteUser: function (index) {
            this.$store.dispatch('deleteAuthor', index);
        },
        move: function (from, to) {
            // this.authors.splice(to, 0, this.authors.splice(from, 1)[0]);
            this.$store.dispatch('moveAuthors', {from, to});
        },
        async searchAuthors(index) {
            this.authors[index].query = this.authors[index].family + " " + this.authors[index].given + ' ' + this.authors[index].email;
            let request = {
                query: this.authors[index].query
            };
            axios.get('/search/author', {params: request})
                .then(response => {
                    this.authors[index].results = response.data;
                })
                .catch(error => {
                });
        },
        deleteSearchInputs: function (index) {
            setTimeout(() => this.authors[index].query = "", 200);
        }
    }
}
</script>
