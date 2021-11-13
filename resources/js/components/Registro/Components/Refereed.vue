<template>
    <b-form-checkbox
        id="refereed"
        v-model="refereed"
        name="refereed"
        value="true"
        unchecked-value="false"
        :required="required"
    >
        Revisado por pares
    </b-form-checkbox>
</template>
<script>
export default {
    name: "registro-components-refereed",
    mounted() {
    },
    props:{
        refereed: {
          type: Boolean,
          default: false,
      },
        required:{
            type: Boolean,
            default: false
        }
    },
    data (){
        return {
        }
    }
}
</script>
