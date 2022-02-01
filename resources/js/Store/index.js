import Vue from 'vue';
import Vuex from 'vuex';
import Registro from './Registro';
import {commit} from "lodash/seq";

Vue.use(Vuex);
export const store = new Vuex.Store({
    state: {
        currentRegistro: {
            id: 'prueba',
            eprintid: '',
            eprint_status: 'inbox',
            title: '',
            abstract: '',
            refereed: false,
            official_url: '',
            volume: '',
            number: '',
            issn: '',
            isbn: '',
            pagerange: '',
            type: '',
            authors: [{
                given: "",
                family: "",
                email: "",
                authorId: '',
                results: [],
                query: ""
            }]
        },
        author: {
            given: "",
            family: "",
            email: "",
            authorId: '',
            results: [],
            query: ""
        },
        type: "type",
        allRegistros: []
    },
    mutations: {
        SET_REGISTRO(state, registro) {
            console.log(this.currentRegistro);
            console.log(registro);
            state.currentRegistro = registro;
        },
        SET_TITLE(state, title) {
            state.currentRegistro.title = title;
        },
        SET_ABSTRACT(state, abstract) {
            state.currentRegistro.abstract = abstract;
        },
        SET_IDS(state, registro) {
            state.currentRegistro.eprintid = registro.eprintid;
            state.currentRegistro.id = registro.id;
        },
        SET_REFEREED(state, refereed) {
            state.currentRegistro.refereed = refereed;
        },
        SET_PUBLISHER(state, publisher) {
            state.currentRegistro.publisher = publisher;
        },
        SET_OFFICIALURL(state, officialurl) {
            state.currentRegistro.official_url = officialurl;
        },
        SET_VOLUME(state, volume) {
            state.currentRegistro.volume = volume;
        },
        SET_NUMBER(state, number) {
            state.currentRegistro.number = number;
        },
        SET_PAGERANGE(state, pagerange) {
            state.currentRegistro.pagerange = pagerange;
        },
        SET_YEAR(state, value) {
            state.currentRegistro.date_year = value;
        },
        SET_MONTH(state, value) {
            state.currentRegistro.date_month = value;
        },
        SET_DAY(state, value) {
            state.currentRegistro.date_day = value;
        },
        SET_DATETYPE(state, value) {
            state.currentRegistro.date_type = value;
        },
        SET_PUBLICATION(state, value) {
            state.currentRegistro.publication = value;
        },
        SET_ISSN(state, value) {
            state.currentRegistro.issn = value;
        },
        SET_PLACEOFPUB(state, value) {
            state.currentRegistro.place_of_pub = value;
        },
        SET_PAGES(state, value) {
            state.currentRegistro.pages = value;
        },
        SET_IDNUMBER(state, value) {
            state.currentRegistro.id_number = value;
        },
        SET_SERIES(state, value) {
            state.currentRegistro.series = value;
        },
        SET_ISBN(state, value) {
            state.currentRegistro.isbn = value;
        },
        SET_BOOKTITLE(state, value) {
            state.currentRegistro.book_title = value;
        },
        SET_TYPE(state, value) {
            state.currentRegistro.type = value;
        },
        ADD_AUTHOR(state, payload){
            Vue.set(state.author, 'email', payload.email);
            Vue.set(state.author, 'given', payload.given);
            Vue.set(state.author, 'family', payload.family);
            Vue.set(state.author, 'authorId', payload.authorId);
            state.currentRegistro.authors.push(state.author);
        },
        MOVE_AUTHORS(state, {from, to}) {
            let authors = state.currentRegistro.authors;
            authors.splice(to, 0, authors.splice(from, 1)[0]);
            state.currentRegistro.authors = authors;
        },
        DELETE_AUTHOR(state, value) {
            let authors = state.currentRegistro.authors;
            authors.splice(value,1);
            state.currentRegistro.authors = authors;
            // const i = state.authors.map(item => item.id).indexOf(value);
            // state.authors.splice(i, 1);
        },
    },
    actions: {
        addAuthor(context, payload){
          context.commit("ADD_AUTHOR", payload);
        },
        moveAuthors({commit}, {from, to}) {
            commit("MOVE_AUTHORS", {from, to});
        },
        deleteAuthor({commit}, index) {
            commit("DELETE_AUTHOR", index);
        },
        setCurrentRegistroAction({commit}, registro) {
            console.log("action");
            console.log(registro);
            commit("SET_REGISTRO", registro);
        },
        setIds({commit}, registro) {
            commit("SET_IDS", registro);
        },
        setTitle({commit}, title) {
            commit("SET_TITLE", title)
        },
        setAbstract({commit}, abstract) {
            commit("SET_ABSTRACT", abstract)
        },
        setRefereed({commit}, refereed) {
            commit("SET_REFEREED", refereed)
        },
        setPublisher({commit}, publisher) {
            commit("SET_PUBLISHER", publisher)
        },
        setOfficialUrl({commit}, officialurl) {
            commit("SET_OFFICIALURL", officialurl)
        },
        setVolume({commit}, volume) {
            commit("SET_VOLUME", volume)
        },
        setNumber({commit}, number) {
            commit("SET_NUMBER", number)
        },
        setPagerange({commit}, pagerange) {
            commit("SET_PAGERANGE", pagerange)
        },
        setYear({commit}, value) {
            commit("SET_YEAR", value)
        },
        setMonth({commit}, value) {
            commit("SET_MONTH", value)
        },
        setDay({commit}, value) {
            commit("SET_DAY", value)
        },
        setDateType({commit}, value) {
            commit("SET_DATETYPE", value)
        },
        setPublication({commit}, value) {
            commit("SET_PUBLICATION", value)
        },
        setIssn({commit}, value) {
            commit("SET_ISSN", value)
        },
        setPlaceOfPub({commit}, value) {
            commit("SET_PLACEOFPUB", value)
        },
        setPages({commit}, value) {
            commit("SET_PAGES", value)
        },
        setIdNumber({commit}, value) {
            commit("SET_IDNUMBER", value)
        },
        setSeries({commit}, value) {
            commit("SET_SERIES", value)
        },
        setIsbn({commit}, value) {
            commit("SET_ISBN", value)
        },
        setBookTitle({commit}, value) {
            commit("SET_BOOKTITLE", value)
        },
        setType({commit}, value) {
            commit("SET_TYPE", value)
        },
        setRegistro({commit}, value) {
            commit("SET_REGISTRO", value)
        },
    },
    getters: {
        getRegistro(state) {
            return state.currentRegistro;
        },
        eprintid(state) {
            return state.currentRegistro.eprintid
        },
        getTitle(state) {
            return state.currentRegistro.title
        },
        getAbstract(state) {
            return state.currentRegistro.abstract
        },
        getRefereed(state) {
            return state.currentRegistro.refereed
        },
        publisher(state) {
            return state.currentRegistro.publisher
        },
        officialUrl(state) {
            return state.currentRegistro.official_url
        },
        volume(state) {
            return state.currentRegistro.volume
        },
        number(state) {
            return state.currentRegistro.number
        },
        pagerange(state) {
            return state.currentRegistro.pagerange
        },
        year(state) {
            return state.currentRegistro.date_year
        },
        month(state) {
            return state.currentRegistro.date_month
        },
        day(state) {
            return state.currentRegistro.date_day
        },
        dateType(state) {
            return state.currentRegistro.date_type
        },
        publication(state) {
            return state.currentRegistro.publication
        },
        issn(state) {
            return state.currentRegistro.issn
        },
        placeOfPub(state) {
            return state.currentRegistro.place_of_pub
        },
        pages(state) {
            return state.currentRegistro.pages
        },
        idNumber(state) {
            return state.currentRegistro.id_number
        },
        series(state) {
            return state.currentRegistro.series
        },
        isbn(state) {
            return state.currentRegistro.isbn
        },
        bookTitle(state) {
            return state.currentRegistro.book_title
        },
        authors(state) {
            return state.currentRegistro.authors
        },
        type(state) {
            console.log(state)
            return state.currentRegistro.type
        },
        documents(state) {
            return state.currentRegistro.documents
        },
    }
})

