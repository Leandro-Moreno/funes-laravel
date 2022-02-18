<template>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div
                    class="pt-4 card card-border-primary"
                    v-bind:class="[registros.length===0    ?   'col-md-12' : 'col-md-4']"
                    style="border:3px solid rebeccapurple;">
                    <div class="card-header" v-if="registros.length>0">
                        <div class="badge badge-pill badge-black">{{total}} registros</div>
                    </div>
                    <div class="card-body text-success">
                        <h2 class="card-title">Búsqueda por el árbol de terminos clave</h2>
                        <treeselect
                            v-model="value"
                            :multiple="true"
                            :load-options="getSubjects"
                            :options="data"
                            :loading="true"
                            :showCount="false"
                            :openOnFocus="true"
                            :closeOnSelect="false"
                            placeholder="Haz click para comenzar..."
                            instanceId="subjects"
                            @input="changes"
                            class="tree"
                        />
                        <!--        <treeselect v-model="value" :multiple="true" :options="data" :showCount="false" :openOnFocus="true" :alwaysOpen="true" />-->
                        <label slot="option-label" slot-scope="{ node, shouldShowCount, count, labelClassName, countClassName }"
                               :class="labelClassName">
                            {{ node.label }} - Description: {{ node.raw.desc }}
                        </label>
                        <p class="card-text" style="color:rebeccapurple">Estos son los registros publicados durante el último mes</p>
                    </div>
                </div>

                <div v-if="registros.length>0"  v-bind:class="[registros.length===0    ?   'col-md-1' : 'col-md-8']">
                    <div class="row justify-content-center results">
                        <div class="card results-card" v-for="(registro, $index) in registros" :key="$index">
                            <a :href="registro.route">
                                <registro-results :citation-prop="registro"></registro-results>
                            </a>
                        </div>
                        <button class="btn-load-more" @click="loadMore">Cargar Más</button>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
            nodes: [],
            total: 0,
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
            await axios.get('/subjectindex')
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
            axios.get('/registroArray', {
                params: {
                    ids: this.nodes
                }
            })
                .then(response => {
                    this.page = 1
                    this.total = response.data.total
                    this.registros.push(...response.data.data);
                });
        },
        loadMore: function () {
            this.page++;
            axios.get('/registroArray', {
                params: {
                    ids: this.nodes,
                    page: this.page
                }
            })
                .then(response => {
                    this.registros.push(...response.data.data);
                });
        },

    },

}
</script>
<style lang="scss">
.results {
    padding-left: 15px;
    &-card{
        margin:6px;
        padding:9px;
    }

}
.csl-bib-body{
    font-weight: 500;
    color:black;
    &:hover{
        color: rebeccapurple;
    }
}
.vue-treeselect{
    &__multi-value-item{
        background-color: rebeccapurple;
        color: white;
    }
}
</style>
