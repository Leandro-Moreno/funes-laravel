<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
<!--                         :start-index="4"-->
                        <form-wizard ref="wizard" action="#" @on-complete="postRegistro"
                                     :title="wizardTitle" :subtitle="wizardSub"
                                     :nextButtonText="wizardnextButtonText" :stepSize="stepSize" transition="slide-fade"
                                     duration="60" color="#167d74">
                            <tab-content title="Tipo de Documento">
                                <div id="v-model-radiobutton" v-for="type in registro_types">
                                    <input type="radio" :id="type.name" :value="type.name" v-model="selected_type"/>
                                    <label :for="type.name">{{ type.label }}</label>
                                    <p>{{ type.description }}</p>
                                </div>
                            </tab-content>
                            <tab-content title="Cargar">
                                <cargar-archivo ref="cargarArchivo"
                                                registro="registro"
                                                v-on:updateregistro="updateregistro"
                                >
                                </cargar-archivo>
                            </tab-content>
                            <tab-content title="Detalles">
                                <registro-type-article v-if="selected_type === 'article'"></registro-type-article>

                            </tab-content>
                            <tab-content title="Términos clave">
                                Yuhuuu! This seems pretty damn simple
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

export default {
    name: "registro-crear",
    mounted() {
        console.clear();
        let wizard = this.$refs.wizard;
        wizard.activateAll();
        this.wizardSub = this.wizardSubtitle;
        axios
            .get('/registro-type')
            .then(response => (this.registro_types = response.data));
    },
    components: {
        FormWizard,
        TabContent
    },
    data() {
        return {
            registro_types: null,
            registro: null,
            wizardSub: null,
            selected_type: ""
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
                prueba: "prueba",
                nombre: this.$refs['detalles'].title,
                resumen: this.$refs['detalles'].description,
                autores: this.$refs['detalles'].$refs['autores'].inputs,
                autoresInstitucionales: this.$refs['detalles'].$refs['autoresInstitucionales'].institucionales,
                infoAdicional: this.$refs['detalles'].$refs['infoAdicional'].darInformacionAdicional(),
                archivoEnviado: this.$refs['cargarArchivo'].darArchivoEnviado(),
                archivoCargado: this.$refs['cargarArchivo'].darArchivoCargado(),
                type: this.selected_type
            })
                .then((response) => {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        updateregistro: function(event){
            this.registro = event;
            this.wizardSub = event.eprintid;
        }
    }
}
</script>
