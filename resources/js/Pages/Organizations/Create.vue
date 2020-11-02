<template>
    <layout>
        <div class="container">
            <h1 class="mb-8 font-bold text-3xl">
            <inertia-link class="text-indigo-400 hover:text-indigo-600" href="/organizations">Organizations</inertia-link>
            <span class="text-indigo-400 font-medium">/</span> Create
            </h1>
            <div class="col-md-6">
                <form action="/organizations" method="POST" class="my-5" @submit.prevent="submit">
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
                    <button type="submit" class="btn btn-primary"> Create User</button>
                </form>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout'
export default {
  components: {
    Layout
  },
  props: {
  },
  data() {
    return {
      sending: false,
      form: {
        name: null,
        email: null,
        phone: null,
        address: null,
        city: null,
        region: null,
        country: null,
        postal_code: null,
      },
    }
  },
  methods: {
      submit: function(){
          this.$inertia.post('/organizations', this.form).then(()=>{

          })
      }
  }
}
</script>
