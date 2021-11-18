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
import {mapGetters} from 'vuex';
export default {
    name: "registro-components-refereed",
    mounted() {
    },
    computed:{
        refereed: {
            get() {
                return this.$store.getters.getRefereed
            },
            set(value) {
                this.$store.dispatch('setRefereed', value)
            }
        },
    },
    props:{
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
