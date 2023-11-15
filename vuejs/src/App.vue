<template>
  <NavBar>
    <template #default>
      <div v-if="mudarPagina === 'home'">
        <h1>Eu sou a pagina principal</h1>
      </div>
      <div v-if="mudarPagina === 'dashboard'">
        <Formulario />
      </div>
    </template>

    <template #rodape>
      <div>meu rodapé</div>
    </template>
  </NavBar>
</template>
<!-- composition -->
<!-- option -->

<script setup>
// import Formulario from './components/Formulario.vue';
// import {ref, watch} from "vue";
//
// const mudarPagina = ref(false);
</script>
<script>
import NavBar from "./layout/NavBar.vue";
import Formulario from "./components/Formulario.vue";

export default {
  components: {Formulario, NavBar},
  data() {
    return {
      mudarPagina: 'home',

    }
  },
  methods: {
    novaFuncao() {

    },
    outraFuncao() {

    }
  },
}
</script>

<style scoped>

.paragrafo-blue {
  color: blue;
}
.paragrafo-red {
  color: red;
}
</style>
