<template>
  <AppBar />
  <main>
    <section>
      <RouterView />
    </section>
  </main>
</template>

<script>
import AppBar from "@/layout/AppBar.vue";

export default {
  name: "Default",
  components: {AppBar}
}
</script>

<style scoped>

</style>