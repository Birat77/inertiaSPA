<template>
  <main>
    <header>
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-2 mb-0">Inertia SPA</p>
        <div class=" sticky-top ">
        <!-- <nav class="navbar sticky-top"> -->
            <!-- <nav class="navbar fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Fixed top</a>
</nav> -->
            <ul class="nav flex-row bg-light mb-0">
                <li class="nav-item p-2">
                    <inertia-link class="nav-link text-dark font-italic bg-white" href="/home">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Home
                    </inertia-link>
                </li>
                <li class="nav-item p-2">
                    <inertia-link class="nav-link text-dark font-italic bg-white" href="/organizations">
                        <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                        Organization
                    </inertia-link>
                </li>
                <li class="nav-item p-2">
                    <inertia-link class="nav-link text-dark font-italic bg-white" href="/blog">
                        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                          Blog
                    </inertia-link>
                </li>
                <li class="nav-item p-2">
                    <inertia-link class="nav-link text-dark font-italic bg-white" href="/contact">
                        <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                        Contact Us
                    </inertia-link>
                </li>
            </ul>
        </div>
                <!-- </nav> -->
        <article>
                <slot/>
        </article>
        <!-- </nav> -->
    </header>
  </main>
</template>

<script>
  export default {
    props: {
      title: String,
    },
    watch: {
      title: {
        immediate: true,
        handler(title) {
          document.title = title
        },
      },
    },
  }
</script>

