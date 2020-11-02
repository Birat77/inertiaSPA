<template>
  <layout title="Welcome">
    <div>
    <h1>Welcome</h1><br>
    <p>Hello {{ user.name }}, welcome to your first Inertia app!</p>
    </div>
  </layout>
</template>

<script>
  import Layout from '../Shared/Layout'

  export default {
    components: {
      Layout,
    },
    props: {
      user: Object,
    },
  }
</script>
