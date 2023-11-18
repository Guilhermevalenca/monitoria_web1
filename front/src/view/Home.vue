<template>
  <HomeLayout>

    <template #header>
      <h1>Pagina principal</h1>
    </template>

    <template #body>

      <div :class="alterColorTitle ? 'title' : ''" @mouseover="isLogged = !isLogged" @mouseout="isLogged = !isLogged">
        qualquer coisa
      </div>
      <div v-if="isLogged">
        <TelaLogged />
      </div>

    </template>

    <template #footer>
      <em>2023.2 monitoria</em>
    </template>

  </HomeLayout>
</template>

<script>
import TelaLogged from "../components/TelaLogged.vue";
import TelaDeCadastro from "../components/TelaDeCadastro.vue";
import HomeLayout from "../layout/HomeLayout.vue";

export default {
  name: "Home",
  components: {HomeLayout, TelaDeCadastro, TelaLogged},
  data() {
    return {
      isLogged: false
    }
  }
}
</script>

<style scoped>

</style>