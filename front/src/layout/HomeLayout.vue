<template>
  <section class="tantofaz">
    <header>
      <slot name="header" />
    </header>
    <main>
      <section>
        <slot name="body" />
      </section>
    </main>
    <footer>
      <slot name="footer" />
    </footer>
  </section>
</template>

<script>
export default {
  name: "HomeLayout"
}
</script>


<style scoped>
.tantofaz {
  border: 1px #646cff solid;
}
</style>