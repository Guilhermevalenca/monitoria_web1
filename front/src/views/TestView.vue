<script>
export default {
  name: "TestView"
}
</script>

<template>
  <h1>Ola, eu sou o test!!!</h1>
  <div >
    <div v-if="$route.params.id">
      <strong>id: </strong>
      <span>{{ $route.params.id }}</span>
    </div>
    <div v-if="$route.params.name">
      <strong>name: </strong>
      <span>{{ $route.params.name }}</span>
    </div>
  </div>
</template>

<style scoped>

</style>