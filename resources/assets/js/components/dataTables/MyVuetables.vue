<template>
    <div class="ui container">
        <div class="vuetable-pagination ui basic segment grid">
            <filter-bar></filter-bar>
            <vuetable
                ref="vuetable"
                :api-url="apiUrl"
                :fields="field"
                :per-page="10"
                pagination-path=""
                :append-params="moreParams"
                @vuetable:pagination-data="onPaginationData">
            </vuetable>
        </div>
        <div class="vuetable-pagination ui basic segment grid" style="display: contents;">
            <vuetable-pagination-info ref="paginationInfo"
            ></vuetable-pagination-info>
            <vuetable-pagination ref="pagination"
                                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </div>
    </div>

</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
    import CustomActions from './CustomeActions'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
    import FilterBar from './FilterBar'
    import VueEvents from 'vue-events'
    import Vue from 'vue'

    Vue.use(VueEvents)
    Vue.use('my-vuetable', Vuetable);
    Vue.component('custom-actions', CustomActions);
    Vue.component('filter-bar', FilterBar);
    export default {
        name: "MyVuetables",
        props:{
            url: {
                type: String,
                required: true
            },
            field: {
                type: Array,
                required: true
            }
        },
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            FilterBar
        },
        data(){
            return {
                apiUrl: this.url,
                sortOrder: [
                ],
                moreParams: {
                    filter: 'respati'
                }


            }
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            onFilterSet (filterText) {
                this.moreParams = {
                    'filter': filterText
                };
                Vue.nextTick( () => this.$refs.vuetable.refresh())
                console.log(this.moreParams.filter);
            },
            onFilterReset () {
                this.moreParams = {}
                Vue.nextTick( () => this.$refs.vuetable.refresh())
                console.log("masuk reset");
            },
            onActions(action, data, index){
                console.log(action + "," + data + "," + index);
            },

        },
        mounted() {
            this.$events.$on('filter-set', eventData => this.onFilterSet(eventData))
            this.$events.$on('filter-reset', e => this.onFilterReset())
        },
    }
</script>

<style scoped>

</style>