<template>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4 card card-border-primary" style="border:3px solid rebeccapurple;">
                    <div class="card-header">
                        <div class="badge badge-pill badge-black">{{total}} registros</div>
                    </div>
                    <div class="card-body text-success">
                        <h2 class="card-title">Últimos Registros</h2>
                        <p class="card-text" style="color:rebeccapurple">Estos son los registros publicados durante el último mes</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row justify-content-center results">
                        <div class="card results-card" v-for="(registro, $index) in latest" :key="$index">
                            <a :href="registro.route">
                                <registro-results :citation-prop="registro"></registro-results>
                            </a>
                        </div>
                        <button class="btn-load-more" @click="manualLoad">Cargar Más</button>
                        <infinite-loading
                            slot="append"
                            @infinite="infiniteHandler"
                            spinner="waveDots"
                            force-use-infinite-wrapper=".el-table__body-wrapper"
                            ref="infiniteLoading"
                            :distance="18"
                        ></infinite-loading>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
<script>
import InfiniteLoading from 'vue-infinite-loading';
export default {
    name: "registro-latest",
    props: {
    },
    methods:{
        infiniteHandler($state = { loaded() {}, complete() {} }) {
            console.log("prueba")
            console.log($state)
            axios.get(`/api/latest?page=${this.page}`)
                .then(response => {
                    console.log(response);
                    this.data = response.data.registro;
                    this.total = this.data.total;
                    this.latest.push(...this.data.data);
                    //each response.data.registro push intro this.latest
                    // this.data.data.forEach(registro => {
                    //     this.latest.push(registro)
                    // });
                    $state.loaded();
                    this.page++
                });
        },
        manualLoad() {
            this.infiniteHandler()
        }
    },
    data() {
        return {
            data: null,
            latest: [],
            page: 1,
            lastPage: null,
            total:0
        }
    },
    mounted() {
        console.log(this.$refs)
        this.infiniteHandler()
    },
    components: {
        InfiniteLoading,
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
</style>
