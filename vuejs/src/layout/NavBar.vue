<template>
  <header>
    <fieldset class="navBar">
      <nav> <!-- navigation -->
        home
      </nav>
      <nav>
        dashboard
      </nav>
    </fieldset>
  </header>
  <main >
    <slot />
  </main>
  <footer>
    <slot name="rodape" />
  </footer>
</template>

<script>
export default {
  name: "NavBar"
}
</script>

<style scoped>
.navBar {
  display: flex;
  justify-content: space-between;
}
</style>