<template>
    <div class="box-body">
        <div class="row col-md-13">
            <div class="col-md-9">
                Say something is  here !!!
            </div>
            <div class="col-md-3 float-right" style="margin-bottom: 4px">
                <input type="search" v-model='query.search' class="form-control" :placeholder="'Search...'">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <slot name="thead"/>
                        </tr>
                        </thead>
                        <tbody>
                        <slot name="tbody"/>
                        </tbody>
                    </table>
                    <div style="display: flex">
                        <pagination
                            :page-count="totalPage"
                            :prev-text="'Previous'"
                            :next-text="'Next'"
                            :page-range="7"
                            v-model="query.page"
                            :container-class="'pagination'"
                            :page-class="'page-item'"
                            :page-link-class="'page-link'">
                        </pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Paginate from 'vuejs-paginate'

export default{
    data(){
        return {
            query: {
                page: 1,
                limit: 10,
                search: '',
            }
        }
    },
    props: {
        totalPage: {
            required: true,
            type: Number,
           },
        value: {
            required: true,
            type: Object
            }
        },
    components: {
        'pagination': Paginate
        },
    watch: {
        value: {
            handler(query) {
                this.query.page = query.page
                this.query.limit = query.limit
                this.query.search = query.search
            },
            immediate: true,
        },
        query: {
            handler() {
                this.$emit('filter', this.query)
            },
            deep: true
        },
    },
}
</script>
