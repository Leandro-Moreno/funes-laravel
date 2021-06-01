<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form-wizard :title="wizardTitle" :subtitle="wizardSubtitle" :nextButtonText="wizardnextButtonText" :stepSize="stepSize" transition="slide-fade" color="#05b35c">
                      <tab-content title="Tipo de Documento">
                        <div id="v-model-radiobutton">
                          <input type="radio" id="article" value="article" v-model="picked" />
                          <label for="article">Artículo</label>
                          <br />
                          <input type="radio" id="book_section" value="book_section" v-model="picked" />
                          <label for="book_section">Sección/Capítulo de libro</label>
                          <br />
                          <input type="radio" id="edited_book" value="edited_book" v-model="picked" />
                          <label for="edited_book">Libro editado</label>
                          <br />
                          <input type="radio" id="edited_book" value="edited_book" v-model="picked" />
                          <label for="edited_book">Libro editado</label>
                          <br />
                          <input type="radio" id="edited_book" value="edited_book" v-model="picked" />
                          <label for="edited_book">Libro editado</label>
                          <br />
                          <input type="radio" id="edited_book" value="edited_book" v-model="picked" />
                          <label for="edited_book">Libro editado</label>
                          <br />
                          
                        </div>
                      </tab-content>
                      <tab-content title="Cargar">
                          My second tab content
                       </tab-content>
                       <tab-content title="Detalles">
                         Yuhuuu! This seems pretty damn simple
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
            console.log('Component mounted.')
        },
        components: {
          FormWizard,
          TabContent
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
        }
    }
</script>
