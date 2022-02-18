<template>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4 card card-border-primary" style="border:3px solid rebeccapurple;">
                    <div class="card-header">
                        <div class="badge badge-pill badge-black">{{total}} registros</div>
                    </div>
                    <div class="card-body text-success">
                        <h2 class="card-title">Todos los Registros</h2>
                        <tree-subject ref="subjects"></tree-subject>
                        <p class="card-text" style="color:rebeccapurple">Estos son los registros publicados durante el último mes</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row justify-content-center results">

                    </div>

                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'registro-main',
        data() {
            return {
                //
            }
        },
        methods: {
            //
        },
        afterMount() {
            // this.$root.$on('registro-main-update', (data) => {
            //     this.total = data.total;
            //     this.$refs.subjects.update(data.subjects);
            // });
            console.log(this.$refs.subjects);
        }
    }
</script>
