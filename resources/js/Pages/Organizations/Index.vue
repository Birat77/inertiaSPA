<template>
    <layout title="organizations">
        <div class="container">
            <div v-if="successMessage" class="alert alert-success mt-4">
                {{ successMessage }}
            </div>
            <h1 class="mb-8 font-bold text-3xl">
                <inertia-link class="text-indigo-400 hover:text-indigo-600" href="/organizations">Organizations</inertia-link>
                <span class="text-indigo-400 font-medium"> | </span>
                <inertia-link class="btn btn-primary" href="/organizations/create">Add Organization</inertia-link>
            </h1>
        <Datatable v-model="query" :total-page="pagination.total_pages" @filter="filter">
            <template v-slot:thead>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </template>
            <template v-slot:tbody>
                <tr v-for="organization in organizations">
                <th scope="row">{{organization.id}}</th>
                <td>{{organization.name}}</td>
                <td>{{organization.email}}</td>
                <td>{{organization.city}}</td>
                <td>
                    <inertia-link class="btn btn-primary" method="GET" :href="`/organizations/${organization.id}/edit`" as="button">Edit</inertia-link>
                    <inertia-link  class="btn btn-danger" :href="`/organizations/${organization.id}`" method="delete" as="button">Delete</inertia-link>
                </td>
                </tr>
            </template>
        </Datatable>
    </div>
    </layout>
</template>
<script>
import Layout from "../../Shared/Layout";
import Datatable from "../../Shared/Datatable";
export default {
    data() {
        return {
            organizations:[],
            query: {
                page: 1,
                limit: 10,
                search: '',
            },
            pagination: {total_pages:0}
        }
    },
    props: {
        errors: Object,
        list: Array,
        successMessage: String
    },
    components: {
      Layout,
      Datatable
    },
    async created() {
        await this.getOrganizationsList();
    },
    methods: {
        filter(queryParameters) {
            this.query = {
                ...this.query,
                ...queryParameters
            }
        },
        getOrganizationsList() {
            let queryParams = Object.assign({}, this.query);
            const targetRoute = '/api/organizations';
            console.log(targetRoute);
            axios.get(targetRoute, {params: queryParams}).then(response => {
                console.log(response.data.data.length);
                this.organizations = response.data.data;
                this.pagination.total_pages = response.data['meta']['last_page'];
            });
        },
    },
    watch: {
        query: {
            handler() {
                this.getOrganizationsList();
            },
            deep: true
        },
    }
}
</script>
