<template>
    <b-form-checkbox
        id="refereed"
        v-model="refereed"
        name="refereed"
        value="true"
        unchecked-value="false"
    >
        El documento ha sido referido
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
      }
    },
    data (){
        return {
        }
    }
}
</script>
