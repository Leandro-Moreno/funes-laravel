<template>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div
                    class="pt-4 card card-border-primary"
                    style="border:3px solid rebeccapurple;"
                    v-bind:class="[results.length===0    ?   'col-md-12' : 'col-md-4']">
                    <div v-if="results.length>0" class="card-header">
                        <div class="badge badge-pill badge-black">{{ totalResults }} registros</div>
                    </div>
                    <div class="card-body text-success">
                        <h2 class="card-title">Resultados de {{ queryValue }}</h2>
                        <div class="wrap">
                            <div class="search">
                                <input v-model="queryValue" class="searchTerm" placeholder="What are you looking for?"
                                       type="text" v-on:keyup.enter="subjectsSelect">
                                <button class="searchButton" type="submit" @click="subjectsSelect">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <treeselect
                            v-model="value"
                            :alwaysOpen="false"
                            :multiple="true"
                            :openOnFocus="true"
                            :options="data"
                            :showCount="false"
                            placeholder="Filtra por terminos clave"
                            @input="subjectsSelect"/>
                        <label><input type="checkbox" v-model="yearRangeActive" @change="subjectsSelect">¿Desea filtrar por rango de años?</label>
                        <vue-slider
                            v-model="yearRange"
                            :dot-options="dotOptions"
                            :max="2022"
                            :min="1950"
                            @drag-end="subjectsSelect"
                            :disabled="! yearRangeActive"
                        />
                        <p class="card-text" style="color:rebeccapurple">Estos son los registros de las búsqueda</p>
                    </div>
                </div>

                <div v-if="results.length>0" v-bind:class="[results.length===0    ?   'col-md-1' : 'col-md-8']">
                    <div class="row justify-content-center results">
                        <div v-for="(registro, $index) in results" :key="registro.id"
                             class="card results-card">
                            <a :href="registro.route">
                                <registro-results :citation-prop="registro"></registro-results>
                            </a>
                        </div>
                        <!--                        <button class="btn-load-more" @click="loadMore">Cargar Más</button>-->
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
<script>
import Treeselect from '@riophae/vue-treeselect'
import VueSlider from 'vue-slider-component'
// import the styles
import 'vue-slider-component/theme/default.css'
import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
    name: 'search-simple',
    data() {
        return {
            results: [],
            totalResults: 0,
            queryValue: '',
            value: [],
            data: [],
            yearRange: [1950, new Date().getFullYear()],
            dotOptions: [{
                tooltip: 'always'
            }, {
                tooltip: 'always'
            }, {
                tooltip: 'always'
            }],
            yearRangeActive: false
        }
    },
    //add props with query var
    props: {
        query: {
            type: String,
            required: true
        }
    },
    components: {
        Treeselect,
        VueSlider
    },
    methods: {
        //add method search using query variable as query for api /api/search-simple using axios. The response is a json object  that must be  into results array
        async search() {
            await axios.get('/api/search-simple?query=' + this.queryValue)
                .then(response => {
                    this.results = [];
                    this.results = response.data.results.data;
                    // this.results.push(...response.data.registro);
                    console.log(response.data)
                })
                .catch(error => {
                    console.log(error);
                })
        },
        subjectsSelect: function (node, instanceId) {
            let idsQuery = this.value;
            let yearsQuery = this.yearRange;
            if (this.value.length === 0) {
                idsQuery = 1;
            }
            if( ! this.yearRangeActive){
                yearsQuery = 'empty';
            }
            axios.get('/api/search-simple?query=' + this.queryValue + '&subjectId=' + idsQuery + '&yearRange=' + yearsQuery)
                .then(response => {
                    this.results = [];
                    this.results = response.data.results.data;
                    this.totalResults = response.data.results.total;
                    console.log(response.data.results.total)
                })
                .catch(error => {
                    console.log(error);
                });
        },
        clickSearch() {
            let url = new URL(window.location.href);
            url.searchParams.set('query', this.queryValue);
            history.pushState(null, '', url);
            this.search();
        },
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

    },
    mounted() {
        this.queryValue = this.query;
        this.search();
    },
    beforeMount() {
        this.getSubjects();
    }
}
</script>
<style lang="scss">
.results {
    padding-left: 15px;

    &-card {
        margin: 6px;
        padding: 9px;
    }

}

.csl-bib-body {
    font-weight: 500;
    color: black;

    &:hover {
        color: rebeccapurple;
    }
}

.search-input {
    font-size: 15px;
    color: var(--serach-input-text-color);
    font-weight: 400;
    outline: none;
    height: 50px;
    width: 100%;
    border: 2px solid rebeccapurple;
    border-radius: 12px;
    transition: all 0.5s ease;
    background: var(--secondary-color);
}

.bx-search {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 22px;
    background: var(--secondary-color);
    color: var(--icons-color);
}

.search {
    width: 100%;
    position: relative;
    display: flex;

    &Term {
        width: 100%;
        border: 3px solid rebeccapurple;
        border-right: none;
        padding: 5px;
        height: 36px;
        border-radius: 5px 0 0 5px;
        outline: none;
        color: rebeccapurple;

        :focus {
            color: #00B4CC;
        }
    }

    &Button {
        width: 40px;
        height: 36px;
        border: 1px solid rebeccapurple;
        background: rebeccapurple;
        text-align: center;
        color: #fff;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-size: 20px;
    }
}

</style>
