<template>
    <div class="card card-body">
        <label class="col-md-12">Información Adicional</label>
        <div>
            <b-form-group label="Arbitrado por especialistas" v-slot="{ ariaDescribedby }">
                <b-form-radio v-model="arbitrado" :aria-describedby="ariaDescribedby" name="arbitrado" value="1">Sí,
                    esta versión ha sido arbitrada.
                </b-form-radio>
                <b-form-radio v-model="arbitrado" :aria-describedby="ariaDescribedby" name="arbitrado" value="0">No,
                    esta versión no ha sido arbitrada.
                </b-form-radio>
            </b-form-group>
            <b-form-group for="estado_id" label="Estado" v-slot="{ ariaDescribedbyd }">
                <b-form-radio v-model="estado_id" :aria-describedby="ariaDescribedbyd" name="estado_id" value="1">
                    Publicado
                </b-form-radio>
                <b-form-radio v-model="estado_id" :aria-describedby="ariaDescribedbyd" name="estado_id" value="2">En
                    Prensa
                </b-form-radio>
                <b-form-radio v-model="estado_id" :aria-describedby="ariaDescribedbyd" name="estado_id" value="3">En
                    Evaluación
                </b-form-radio>
                <b-form-radio v-model="estado_id" :aria-describedby="ariaDescribedbyd" name="estado_id" value="4">
                    Inédito
                </b-form-radio>
            </b-form-group>
            <b-container fluid>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="tipo_de_publicacion">Título de Publicación/Revista:</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="tipo_de_publicacion" id="tipo_de_publicacion" size="sm"
                                      placeholder="Ingrese nombre de la publicación"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="issn">ISSN:</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="issn" id="issn" placeholder="issn"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="editor">Editor:</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="editor" id="editor" placeholder="Editor"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="url_oficial">URL oficial:</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="url_oficial" type="url" id="url_oficial"
                                      placeholder="URL oficial"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="volumen">Volumen</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="volumen" type="" id="volumen" placeholder="Volumen"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="numero_serie">Número</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="numero_serie" autocomplete="name" type="number" min="1" id="numero_serie"
                                      placeholder="Número"></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="pagina_de">Rango de páginas</label>
                    </b-col>
                    <b-col sm="1">
                        <b-form-input v-model="pagina_de" type="number" id="pagina_de" min="0"
                                      placeholder=""></b-form-input>
                    </b-col>
                    <b-col sm="1">
                        <label for="pagina_hasta">a</label>
                    </b-col>
                    <b-col sm="1">
                        <b-form-input v-model="pagina_hasta" type="number" id="pagina_hasta" min="1"
                                      placeholder=""></b-form-input>
                    </b-col>
                </b-row>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="date_pub">Fecha de Publicación</label>
                    </b-col>
                    <b-col sm="2">
                        <b-form-input v-model="año_publicacion" type="number" id="año_publicacion"
                                      placeholder="año_publicacion"></b-form-input>
                    </b-col>
                    <b-col sm="2">
                        <b-form-select v-model="mes_publicacion" size="sm"
                                       :options="listames_publicaciones"></b-form-select>
                    </b-col>
                    <b-col sm="2">
                        <b-form-input v-model="dia_publicacion" type="number" id="dia_publicacion" min="1"
                                      placeholder="Día"></b-form-input>
                    </b-col>
                </b-row>
                <b-form-group label="Tipo de Fecha" v-slot="{ tipoDeFecha }">
                    <b-form-radio v-model="tipo_de_fecha" :aria-describedby="tipoDeFecha" name="tipo_de_fecha"
                                  value="unspecified">SIN ESPECIFICAR
                    </b-form-radio>
                    <b-form-radio v-model="tipo_de_fecha" :aria-describedby="tipoDeFecha" name="tipo_de_fecha"
                                  value="published">Publicación
                    </b-form-radio>
                    <b-form-radio v-model="tipo_de_fecha" :aria-describedby="tipoDeFecha" name="tipo_de_fecha"
                                  value="submitted">Presentación
                    </b-form-radio>
                    <b-form-radio v-model="tipo_de_fecha" :aria-describedby="tipoDeFecha" name="tipo_de_fecha"
                                  value="completed">Terminación
                    </b-form-radio>
                </b-form-group>
                <b-row class="my-1">
                    <b-col sm="2">
                        <label for="numero_identificacion">Número de Identificación</label>
                    </b-col>
                    <b-col sm="10">
                        <b-form-input v-model="numero_identificacion" type="text" autocomplete="name"
                                      id="numero_identificacion" placeholder="Número de Identificación"></b-form-input>
                    </b-col>
                </b-row>
            </b-container>
        </div>
        <div class="mt-3">Selected: <strong>{{ estado_id }}</strong></div>
    </div>
</template>
<script>
export default {
    name: "registro-info-adicional",
    data() {
        return {
            arbitrado: '',
            estado_id: '',
            tipo_de_publicacion: '',
            issn: '',
            editor: '',
            url_oficial: '',
            volumen: '',
            pagina_de: '',
            pagina_hasta: '',
            numero_serie: '',
            dia_publicacion: '',
            mes_publicacion: '',
            año_publicacion: '',
            tipo_de_fecha: '',
            numero_identificacion: '',
            listames_publicaciones: [
                {value: null, text: 'Elige mes_publicacion'},
                {value: '1', text: 'Enero'},
                {value: '2', text: 'Febrero'},
                {value: '3', text: 'Marzo'},
                {value: '4', text: 'Abril'},
                {value: '5', text: 'Mayo'},
                {value: '6', text: 'Junio'},
                {value: '7', text: 'Julio'},
                {value: '8', text: 'Agosto'},
                {value: '9', text: 'Septiembre'},
                {value: '10', text: 'Octubre'},
                {value: '11', text: 'Noviembre'},
                {value: '12', text: 'Diciembre'},
            ]
        }
    },
    methods: {
        darInformacionAdicional: function () {
            let info = {
                arbitrado: this.arbitrado,
                estado_id: this.estado_id,
                tipo_de_publicacion: this.tipo_de_publicacion,
                issn: this.issn,
                editor: this.editor,
                url_oficial: this.url_oficial,
                volumen: this.volumen,
                pagina_de: this.pagina_de,
                pagina_hasta: this.pagina_hasta,
                numero_serie: this.numero_serie,
                dia_publicacion: this.dia_publicacion,
                mes_publicacion: this.mes_publicacion,
                ano_publicacion: this.año_publicacion,
                tipo_de_fecha: this.tipo_de_fecha,
                numero_identificacion: this.numero_identificacion
            }
            return info;
        }
    }
}
</script>
