<template>
<div class="row ml-1 mr-1">
    <div class="col-md-4">
        <registro-title :registro="registro"></registro-title>
    </div>
    <div class="col-md-8">
        <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">Código id</div>
                            <div class="col-md-8">{{registro.eprintid}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Subject</div>
                            <div class="col-md-8">
                                <div v-for="subject in registro.subjects">
                                    {{subject.name}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Autores</div>
                            <div class="col-md-8">
                                <div v-for="author in registro.authors">
                                    {{author.given }} {{author.family }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Divisions</div>
                            <div class="col-md-8">
                                <div v-for="division in registro.divisions">
                                    {{division.name}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <pdf-viewer :pdf-url="registro.documents[0].url"></pdf-viewer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
  export default {
        props: ['registro'],
      beforeCreate() {
      },
      mounted(){

        },
        data(){
          return {
          }
        }
  }
</script>
