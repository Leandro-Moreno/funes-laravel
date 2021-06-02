<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <form-wizard ref="wizard" :start-index="2" :title="wizardTitle" :subtitle="wizardSubtitle" :nextButtonText="wizardnextButtonText" :stepSize="stepSize" transition="slide-fade" duration="60" color="#05b35c">
                      <tab-content title="Tipo de Documento">
                        <div id="v-model-radiobutton">
                          <input type="radio" id="article" value="article" v-model="picked" />
                          <label for="article">Artículo</label>
                          <p>Un artículo en una publicación seriada periódica. Incluye artículos en revistas de investigación, periódicos y boletines, entre otros. Los artículos no tienen necesariamente que haber sido revisados por pares. Puede ser un artículo publicado en un medio electrónico.</p>
                          <input type="radio" id="book_section" value="book_section" v-model="picked" />
                          <label for="book_section">Sección/Capítulo de libro</label>
                          <p>Un capítulo o sección de un libro. No incluye trabajos presentados en congresos que hayan sido publicados en el libro de actas. Para estos trabajos, seleccione la opción "Contribución en actas de congresos".</p>
                          <input type="radio" id="edited_book" value="edited_book" v-model="picked" />
                          <label for="edited_book">Libro editado</label>
                          <p>Un libro compuesto de capítulos con diferentes autores. El libro debe tener uno o más editores e ISBN. Los capítulos deben tener un rango de páginas en el que se ubican dentro del libro.<p/>
                          <input type="radio" id="book" value="book" v-model="picked" />
                          <label for="book">Libro</label>
                          <p>Un libro publicado. Incluye libros editados y actas de congresos, entre otros. Puede ser un libro publicado en medio electrónico (como CD) siempre que tenga un ISBN asignado.<p/>
                          <input type="radio" id="thesis" value="thesis" v-model="picked" />
                          <label for="thesis">Tesis</label>
                          <p for="thesis">Una tesis de licenciatura o posgrado.<p/>
                          <input type="radio" id="acta_congreso" value="acta_congreso" v-model="picked" />
                          <label for="acta_congreso">Contribución a actas de congreso</label>
                          <p>Un documento publicado en un libro de actas de congresos. El libro de actas debe tener ISBN asignado y editores. En caso contrario, seleccione la opción "Conferencia, Comunicación, Cartel, Taller, Curso o Participación en Mesa Redonda".<p/>
                          <input type="radio" id="conference" value="conference" v-model="picked" />
                          <label for="conference"> Conferencia, Comunicación, Cartel, Taller, Curso o Participación en Mesa Redonda</label>
                          <p for="conference">El documento de una conferencia, comunicación, taller, cartel, curso o participación en una mesa redonda realizados en algún evento o institución. Si usted tiene únicamente el o los archivos de PowerPoint (u otro formato) de su presentación, puede crear el registro con esos archivos sin necesidad de incluir archivos adicionales. Si el documento de la conferencia ha sido publicado en las actas del congreso o en un libro editado con isbn, editores y rango de páginas para el documento, utilice alguna de las secciones anteriores (aquí puede incluir los archivos de la presentación).<p/>
                          <input type="radio" id="monograph" value="monograph" v-model="picked" />
                          <label for="monograph">Documento no publicado</label>
                          <p>Un documento que no ha sido publicado. Aquí se incluyen los trabajos de título de grado.<p/>
                          <input type="radio" id="teaching_resource" value="teaching_resource" v-model="picked" />
                          <label for="teaching_resource">Recursos de enseñanza</label>
                          <p>Actividades de enseñanza: apuntes, ejercicios, exámenes o curso de los programas.<p/>
                          <input type="radio" id="image" value="image" v-model="picked" />
                          <label for="image">Imagen</label>
                          <p>Fotografía digital o una imagen o figura en formato electrónico.<p/>
                          <input type="radio" id="video" value="video" v-model="picked" />
                          <label for="video">Video</label>
                          <p>Un video digital<p/>
                          <input type="radio" id="audio" value="audio" v-model="picked" />
                          <label for="thesis">Audio</label>
                          <p>Una grabación de sonido digital.<p/>
                          <input type="radio" id="dataset" value="dataset" v-model="picked" />
                          <label for="dataset">Dataset</label>
                          <p>Una colección limitada de datos cuantitativos (por ejemplo, hoja de cálculo o archivo de datos XML).<p/>
                          <input type="radio" id="experiment" value="experiment" v-model="picked" />
                          <label for="experiment">Experimento</label>
                          <p>Los datos experimentales con los análisis intermedios y el resumen de los resultados.<p/>
                          <input type="radio" id="other" value="other" v-model="picked" />
                          <label for="other">Otro</label>
                          <p>Algo dentro del ámbito del repositorio, pero que no está cubierto en las otras categorías.<p/>
                          
                          <p>El mensaje es: {{picked}}</p>
                        </div>
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
            var wizard = this.$refs.wizard
            wizard.activateAll()
            console.log('Creacion de registro montado.')
        },
        components: {
          FormWizard,
          TabContent
        },
        data (){
          return {
            picked: ""
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
        }
    }
</script>
