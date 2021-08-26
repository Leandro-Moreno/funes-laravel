<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="card-title">
                  {{registro.nombre}}
                  </h2>
                  <div class="card-description">
                    <h3 class="card-title">Resumen</h3>
                    {{registro.resumen}}
                  </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
  export default {
        props: ['registroprop'],
        created(){
          this.registro = this.registroprop;
          console.log(this.registro);
          console.log(this.registro.resumen);
        },
        data(){
          return {
            registro: [],
          }
        }
  }  
</script>
