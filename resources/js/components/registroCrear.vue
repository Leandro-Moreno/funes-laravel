<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form-wizard ref="wizard" :start-index="2" :title="wizardTitle" :subtitle="wizardSubtitle" :nextButtonText="wizardnextButtonText" :stepSize="stepSize" transition="slide-fade" duration="60" color="#05b35c">
                      <tab-content title="Tipo de Documento">
                        <div id="v-model-radiobutton" v-for="tipo in tipos_registro">
                          <input type="radio" :id="tipo.name" :value="tipo.name" v-model="picked" />
                          <label :for="tipo.name">{{tipo.label}}</label>
                          <p :for="tipo.name">{{tipo.description}}<p/>
                          
                        </div>
                        <p>El mensaje es: {{picked}}</p>
                      </tab-content>
                      <tab-content title="Cargar">
                          <cargar-archivo></cargar-archivo>
                       </tab-content>
                       <tab-content title="Detalles">
                         <registro-detalles></registro-detalles>
                       </tab-content>
                       <tab-content title="Términos clave">
                         Yuhuuu! This seems pretty damn simple
                       </tab-content>
                       <tab-content title="Depositar">
                         Yuhuuu! This seems pretty damn simple
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
        mounted() {
            let wizard = this.$refs.wizard
            wizard.activateAll()
            console.log('Creacion de registro montado.')
            axios
              .get('http://localhost:3002/api/tipos-registro')
              .then(response => (this.tipos_registro = response.data.tipos_registro))
        },
        components: {
          FormWizard,
          TabContent
        },
        data (){
          return {
            picked: "",
            tipos_registro: null
          }          
        },
        props: {
          wizardTitle: {
            type: String,
            default: 'Crear Registro'
          },
          wizardSubtitle: {
            type: String,
            default: 'Prueba de titulo'
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
        }
    }
</script>
