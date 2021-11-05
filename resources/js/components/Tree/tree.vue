<template>
    <div class="row">
        <treeselect
            v-model="value"
            :multiple="true"
            :load-options="getSubjects"
            :options="data"
            :loading="true"
            :showCount="false"
            :openOnFocus="true"
            :closeOnSelect="false"
            instanceId="subjects"
            @input="changes"
            v-bind:class="[registros.length===0    ?   'col-md-12' : 'col-md-3']"
        />
        <!--        <treeselect v-model="value" :multiple="true" :options="data" :showCount="false" :openOnFocus="true" :alwaysOpen="true" />-->
        <label slot="option-label" slot-scope="{ node, shouldShowCount, count, labelClassName, countClassName }"
               :class="labelClassName">
            {{ node.label }} - Description: {{ node.raw.desc }}
        </label>
        <div v-if="registros.hasOwnProperty('data')" class="col-md-9 row">
            <div class="col-md-3" v-for="registro in registros.data">
                <a :href="registro.route" class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ registro.title }}</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </a>
            </div>
        </div>
        <nav>
            <ul class="pagination">
                <li class="page-item" v-show="registros['prev_page_url']">
                    <a href="#" class="page-link" @click.prevent="getPreviousPage">
                                <span>
                                  <span aria-hidden="true">«</span>
                                </span>
                    </a>
                </li>
                <li class="page-item" :class="{ 'active': (registros['current_page']=== n) }" v-for="(n, index) in registros['last_page']" v-if="index <= 10">
                    <a href="#" class="page-link" @click.prevent="getPage(n)">
                                <span >
                                    {{ n }}
                                </span>
                    </a>
                </li>
                <li class="page-item" v-show="registros['next_page_url']">
                    <a href="#" class="page-link" @click.prevent="getNextPage">
                                <span>
                                  <span aria-hidden="true">»</span>
                                </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
// import the component
import Treeselect from '@riophae/vue-treeselect'
// import the styles
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
    name: "tree-subject",
    props: [
        'dataChildren'
    ],
    data() {
        return {
            data: null,
            value: [],
            registros: [],
            subjects: [],
            treeselectOptions: [],
            nodes: []
        }
    },
    mounted() {
        this.getSubjects();
    },
    created() {
        if (this.subjects.length > 0) {
            this.value.push(this.subject.id);
            this.data = this.subject.children;
        }
        if (this.data.length > 0) {
            this.SearchRegistros(this.value);
        }

    },
    computed: {},
    components: {Treeselect},
    methods: {
        async getSubjects({callback}) {
            await axios.get('/api/subjectindex')
                .then(response => {
                    this.data = [];
                    let tempData = response.data;
                    tempData[0].children.forEach((arrayData) => {
                        this.data.push(arrayData);
                    });
                    callback();
                });
        },

        changes: function (node, instanceId) {
            if (node.length > 0) {
                this.SearchRegistros(node);
            } else {
                this.registros = [];
            }
        },
        loadRegistrosInSubject: function (subject) {
            subject.children.forEach((subjectChildren) => {
                this.loadRegistrosInSubject(subjectChildren);
            });
            if ("registros" in subject) {
                subject.registros.forEach((registro) => {
                    this.registros.push(registro);
                });
            }
        },
        SearchRegistros: function (node) {
            this.nodes = node;
            axios.get('/api/registroArray', {
                params: {
                    ids: this.nodes
                }
            })
                .then(response => {
                    this.registros = response.data;
                });
        },
        getPage(page) {
            this.$http.get('/api/contactos?page=' + page).then((response) => {
                this.$set(this.$data, 'contactos', response.data);
            }, (response) => {
            });

            axios.get('/api/registroArray?page=' + page, {
                params: {
                    ids: this.nodes
                }
            })
                .then(response => {
                    this.registros = response.data;
                });
        },
        getPreviousPage() {
            axios.get(this.registros['prev_page_url'], {
                params: {
                    ids: this.nodes
                }
            })
                .then(response => {
                    this.registros = response.data;
                });
        },
        getNextPage() {
            axios.get(this.registros['next_page_url'], {
                params: {
                    ids: this.nodes
                }
            })
                .then(response => {
                    this.registros = response.data;
                });
        }
    },

}
</script>
