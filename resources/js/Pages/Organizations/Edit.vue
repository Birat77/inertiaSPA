<template>
    <layout>
        <div class="container">
            <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-indigo-400 hover:text-indigo-600" href="/organizations">Organizations</inertia-link>
            <span class="text-indigo-400 font-medium">/</span> Update
            </h1>
            <div class="col-md-6">
                <form action="/organizations" class="my-5" @submit.prevent="update">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" placeholder="email" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="phone" v-model="form.phone">
                    </div>
                    <div class="form-group">
                        <label for="address">address</label>
                        <input type="text" class="form-control" id="address" placeholder="address" v-model="form.address">
                    </div>
                    <div class="form-group">
                        <label for="city">city</label>
                        <input type="text" class="form-control" id="city" placeholder="city" v-model="form.city">
                    </div>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </form>
                <button @click="deleteOrg" class="btn btn-danger"> Delete </button>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    Layout
  },
  props: ['organization'],
  data() {
    return {
      form: {
        name:'',
        email:'',
        phone:'',
        address:'',
        city:'',
        region:'',
        country:'',
        postal_code:'',
      },
    };
  },
  mounted(){
     this.form= {...this.organization}
  },
  methods: {
      update: function(){
        //   this.$inertia.patch(`/organizations/${this.organization.id}`, this.form).then(()=>{

        //   })
        Inertia.visit(`/organizations/${this.organization.id}`, {
            method: 'post',
            data: this.form,
        })
      },
      deleteOrg: function(){
          if(confirm('Are you sure you want to delete the organization?')){
              this.$inertia.delete(`/organizations/${this.organization.id}`, this.form)
            console.log('ya');
          }
      },
    }
}
</script>
