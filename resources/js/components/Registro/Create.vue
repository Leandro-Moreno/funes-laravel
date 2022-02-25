<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card--border">
                    <div class="card-body card--padding-0">
<!--                         :start-index="4"-->
                        <form-wizard :start-index="1" ref="wizard" action="#" @on-complete="postRegistro"
                                     :title="wizardTitle" :subtitle="wizardSub"
                                     :backButtonText="wizardbackButtonText" :finishButtonText="wizardfinishButtonText"
                                     :nextButtonText="wizardnextButtonText" :stepSize="stepSize" transition="slide-fade"
                                     duration="60" color="#4b4898">
                            <tab-content title="Tipo de Documento">
                                <div id="v-model-radiobutton" v-for="(type, index) in registro_types" :key="`type-${index}`">
                                    <input type="radio" :id="type.name" :value="type.name" v-model="selected_type"/>
                                    <label :for="type.name">{{ type.label }}</label>
                                    <p :for="type.name">{{ type.description }}</p>
                                </div>
                            </tab-content>
                            <tab-content title="Cargar">
                                <cargar-archivo ref="cargarArchivo"
                                                v-on:updateregistro="updateregistro"
                                >
                                </cargar-archivo>
                            </tab-content>
                            <tab-content title="Detalles">
                                <registro-type-article v-if="selected_type === 'article'"></registro-type-article>
                                <registro-type-book-section v-if="selected_type === 'book_section'"></registro-type-book-section>
                                <registro-type-edited-book v-if="selected_type === 'edited_book'"></registro-type-edited-book>
                                <registro-type-book v-if="selected_type === 'book'"></registro-type-book>

                            </tab-content>
                            <tab-content title="Términos clave">
                                <registro-tree ref="subjects"></registro-tree>
                            </tab-content>
                            <tab-content title="Depositar">
                                <p>Como editor de este elemento, puede moverlo al estado "en revisión" sin tener que
                                    resolver los problemas indicados. En dado caso, seleccione Guardar para Más Adelante
                                    para corregir estos problemas más tarde.</p>

                                <p>Para trabajos depositados por su propio autor: Al depositar la colección de archivos
                                    y metadatos bibliográficos asociados a este registro, otorgo a Funes el derecho para
                                    almacenarlos y ponerlos a disposición pública permanentemente de un modo gratuito y
                                    en línea.</p>

                                <p>Declaro que este material es de mi propiedad intelectual y entiendo que Funes no
                                    asume ninguna responsabilidad en caso de que se produzca una violación de derechos
                                    de propiedad al distribuir estos archivos o metadatos. (Se insta a todos los autores
                                    a destacar sus derechos de autor en la página de título del documento principal de
                                    sus registros en Funes.)</p>

                                <p>Para trabajos depositados por personas distintas a su autor: Por la presente, declaro
                                    que la colección de archivos y metadatos bibliográficos asociados al registro que
                                    estoy depositando en Funes es de dominio público. Si éste no fuese el caso, acepto
                                    totalmente la responsabilidad por cualquier infracción de derechos de autor que
                                    conlleve la distribución de estos archivos o metadatos.</p>

                                <p>Pulsar en el botón de depósito indica que usted está de acuerdo con estos
                                    términos.</p>
                            </tab-content>
                        </form-wizard>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import {FormWizard, TabContent} from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';
import {mapGetters} from 'vuex';

export default {
    name: "registro-crear",
    computed: {
        ...mapGetters({
            registro: 'getRegistro'
        }),
        selected_type: {
            get() {
                return this.$store.getters.type
            },
            set(value) {
                this.$store.dispatch('setType', value)
            }
        }
    },
    mounted() {
        axios
            .get('/registro-type')
            .then(response => (this.registro_types = response.data));
        console.log(this.registro_types);
        let wizard = this.$refs.wizard;
        wizard.activateAll();
        this.wizardSub = "wiz sub";
        // this.makeToast('success');
    },
    components: {
        FormWizard,
        TabContent
    },
    data() {
        return {
            registro_types: null,
            wizardSub: null,
        }
    },
    props: {
        wizardTitle: {
            type: String,
            default: 'Crear Registro'
        },
        wizardSubtitle: {
            type: String,
            default: 'Prueba de titulos'
        },
        wizardbackButtonText: {
            type: String,
            default: 'Atrás'
        },
        wizardfinishButtonText: {
            type: String,
            default: 'Finalizar'
        },
        wizardnextButtonText: {
            type: String,
            default: 'Siguiente'
        },
        stepSize: {
            type: String,
            default: 'sm',
            validator: (value) => {
                let acceptedValues = ['xs', 'sm', 'md', 'lg']
                return acceptedValues.indexOf(value) !== -1
            }
        }
    },
    methods: {
        postRegistro: function () {
            axios.post('/registro', {
                registro: this.registro
            })
                .then((response) => {
                    this.$store.dispatch('setIds', response.data.registro);
                    this.makeToast('success', 'Eprintid'+ response.data.registro.eprintid, response.data.registro.route);
                    window.location.href = response.data.route;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        updateregistro: function(event){
            this.registro = event;
            this.wizardSub = event.eprintid;
        },
        makeToast(variant = 'success', title = 'Creado exitosamente', route = '') {
            this.$bvToast.toast('El eprint ha sido creado exitosamente', {
                href: route,
                title: `Variant ${variant || 'default'}`,
                variant: variant,
                toaster: 'b-toaster-top-right',
                solid: true,
                autoHideDelay: '50000',
            })
        },
        updateUrlToEprintid(EpId) {
            let url = window.location.href;
            url = url.replace('create',EpId+'/edit');
            history.pushState(null, '', url);
            window.location.reload();
        }
    },
    watch: {
        $props: {
            handler() {
                // console.log(this.parseData());
            },
            deep: true,
            immediate: true,
        },
        'registro.eprintid': function(newVal, oldVal){
            console.log(oldVal,newVal)
            this.updateUrlToEprintid(newVal)
        }
    },
}
</script>
