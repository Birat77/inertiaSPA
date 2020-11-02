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
        <table class="table table-striped p-2">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="organization in list">
                <th scope="row">{{organization.id}}</th>
                <td>{{organization.name}}</td>
                <td>{{organization.email}}</td>
                <td>{{organization.city}}</td>
                <td>
                   <inertia-link class="btn btn-primary" method="GET" :href="`/organizations/${organization.id}/edit`" >Edit</inertia-link>
                   <inertia-link class="btn btn-danger" method="DELETE" :href="`/organizations/${organization.id}`">Delete</inertia-link>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    </layout>
</template>
<script>
import Layout from "../../Shared/Layout";
export default {

    props: {
        errors: Object,
        list: Array,
        successMessage: String
        // create_url: String
    },
    components: {
      Layout,
    },
}
</script>
