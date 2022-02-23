<template>
    <div>
        <treeselect
            v-model="value"
            :multiple="true"
            :load-options="getSubjects"
            :options="arraySubjects"
            :loading="true"
            :showCount="false"
            :openOnFocus="true"
            :closeOnSelect="false"
            placeholder="Haz click para comenzar..."
            class="tree" />
        <ul>
            <li v-for="node in value">
                {{node}}
            </li>
        </ul>
    </div>
</template>
<script>
import Treeselect from '@riophae/vue-treeselect'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
    name: 'registro-tree',
    props: ['dataChildren'],
    data(){
      return{
          arraySubjects: [],
          subjectsSelectedOptions: [],
          nodes: [],
          subjects: [],
          data: []
      }
    },
    computed: {
        value: {
            get() {
                return this.$store.getters.getSubjects
            },
            set(value) {
                this.$store.dispatch('setSubjects', value)
            }
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
    components: {Treeselect},
    methods: {
        async getSubjects(  ) {
             await axios.get('/subjectindex')
                .then(response => {
                    this.arraySubjects = [];
                    let tempData = response.data;
                    console.log(response.data);
                    tempData[0].children.forEach((arrayData) => {
                        this.arraySubjects.push(arrayData);
                    });
                });
        },
        async getSubjectsTree({callback}){
          this.getSubjects()
              .then(
              callback()
          );
        },
        changes: function (node, instanceId) {
            if (node.length > 0) {
                console.log("changes Method");
            }
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
