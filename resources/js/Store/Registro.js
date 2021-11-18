import axios from "axios";

export default {
    namespaced: true,
    state: {
        currentRegistro: {
            id: '',
            eprintid: '',
            eprint_status: 'inbox',
            title: '',
            abstract: ''
        },
        allRegistros: []
    },
    mutations: {
        SET_REGISTRO(state, registro) {
            console.log("mutation"+registro);
            state.currentRegistro = registro;
        }
    },
    actions: {
        setCurrentRegistroAction( {commit}, registro ) {
            console.log("actions"+registro);
            commit("SET_REGISTRO", registro);
        }
    },
    getters:{
        getRegistro(state){
            return state.currentRegistro;
        },
        getRegistroEprintid(state){
            return state.currentRegistro.eprintid;
        }
    }
}
