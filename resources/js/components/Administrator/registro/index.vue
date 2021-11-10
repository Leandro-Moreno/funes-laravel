<template>
    <div>
        <vuetable ref="vuetable"
                  api-url="/administrator/registro-index"
                  :fields="fields"
                  data-path="data"
                  pagination-path="path"
                  :sort="sort"
                  :searchable="searchable"
                  :page="page"
                  :per_page="per_page"
        ></vuetable>
        <vuetable-pagination ref="pagination" ></vuetable-pagination>
    </div>
</template>

<script>
import Vuetable from "vuetable-2";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import VuetablePaginationDropdown from "vuetable-2/src/components/VuetablePaginationDropdown";

export default {
    name: "administrator-registro-index",
    data() {
        return {
            fields: [
                {
                    name: 'eprintid',
                    title: 'Registro ID.',
                    sortField: 'eprintid'
                },
                {
                    name: 'title',
                    sortField: 'name',
                    title: 'Título'
                },
                {
                    name: 'abstract',
                    visible: false,
                    title: 'resumen'
                },
                {
                    name: 'eprint_status',
                    title: 'Status'
                }
            ],
            itemActions: [
                { name: 'view-item', label: '', icon: 'zoom icon', class: 'ui teal button' },
                { name: 'edit-item', label: '', icon: 'edit icon', class: 'ui orange button'},
                { name: 'delete-item', label: '', icon: 'delete icon', class: 'ui red button' }
            ],
            sort: 'title|asc',
            page: 1,
            per_page: 11,
            searchable: [ // This means the 'users.name', 'users.email' and 'companies.name' columns can be filtered through the 'filter' attribute in the data.
                'title',
                'abstract',
                'eprinid',
            ]
        }
    },
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationDropdown
    },
    mounted() {
        console.clear();
    },
    methods: {
        viewProfile: function(id) {
            console.log('view profile with id:', id)
        }
    }
}
</script>
