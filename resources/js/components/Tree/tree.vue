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
                            :options="data"
                            :loading="true"
                            :showCount="false"
                            :openOnFocus="true"
                            :closeOnSelect="false"
                            placeholder="Haz click para comenzar..."
                            instanceId="subjects"
                            @input="changes"
                            class="tree"
                            ref="vueTree"
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
                        <div class="btn btn-outline" v-on:click="toggleSubjects">toggle show subjects</div>
                        <div class="card results-card" v-for="(registro, $index) in registros" :key="$index">
                            <div class="card-header" style="padding:1px" v-if="showSubjects">
                                <a v-for="subject in registro.subjects" :href="subject.route">
                                    <div class="badge badge-pill badge-black">{{subject.result}}</div>
                                </a>
                            </div>
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
        'dataChildren',
        'ids',
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
            showSubjects: true,
            options: []
        }
    },
    beforeMount() {
        this.getSubjects();
    },
    mounted() {
        // this.value = this.ids;
        this.$nextTick(() => {
            this.value = this.ids;
        })
    },
    created() {
        // this.options = this.ids.map( v=> {
        //     return { id:v};
        // });
        // console.log(this.$refs);
        // console.log(this.$refs['vueTree']);
        // this.$refs.vueTree.forest.nodeMap[this.default_label_id].label = this.ids;
        // this.$refs.vueTree.forest.selectedNodeIds = this.ids;
        console.log(this.$refs);
        if (this.subjects.length > 0) {
            this.value.push(this.subject.id);
            this.data = this.subject.children;
        }
        if (this.data.length > 0) {
            this.SearchRegistros(this.value);
        }
    },
    afterCreate() {
        this.$refs.vueTree.forest.selectedNodeIds = this.ids;
    },
    computed: {},
    components: {Treeselect},
    methods: {
        async getSubjects() {
            await axios.get('/subjectindex')
                .then(response => {
                    this.data = [];
                    let tempData = response.data;
                    tempData[0].children.forEach((arrayData) => {
                        this.data.push(arrayData);
                    });
                });
        },

        changes: function (node, instanceId) {
            this.value = [];
            if (node.length > 0) {
                this.value.push(...node);
                this.SearchRegistros(node);
            } else {
                this.registros = [];
            }
            this.updateRoute();
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
        updateRoute: function () {
            let url = new URL(window.location.origin + window.location.pathname);
            console.log(window.location);
            console.log(window.location.href);
            console.log(url);
            console.log(this.nodes);
            if(this.nodes.length > 0){
                this.nodes.forEach((node) => {
                    url.searchParams.append('ids[]', node);
                });
            }
            history.pushState(null, '', url);
            console.log(url);
        },
        toggleSubjects: function () {
            this.showSubjects = !this.showSubjects;
        }

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
