<template>

  <button @click="reqApi()">requisição</button>
  <button @click="getTodos()">resgatar todos</button>
  <div>
    <strong>Name: </strong>
    <span>{{ name }}</span>
  </div>
  <div>
    <strong>Surname: </strong>
    <span>{{ surname }}</span>
  </div>

  <table border="1">
    <thead>
      <tr>
        <th>title</th>
        <th>description</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(todo, index) in todos" :key="index" :class="todo.status ? 'concluido' : '' ">
        <td>{{ todo.title }}</td>
        <td>{{ todo.description }}</td>
        <td>{{ todo.status ? 'Concluido' : 'Não concluido' }}</td>
      </tr>
    </tbody>
  </table>
</template>

<!-- option -->
<script>
import Home from "./view/Home.vue";
import axios from 'axios';
export default {
  components: {Home},
  data() {
    return {
      name: null,
      surname: null,
      todos: []
    }
  },
  methods: {
    reqApi() {
      axios.get('http://localhost:8000')
          .then(response => {
            console.log(response.data);
            this.name = response.data.name;
            this.surname = response.data.surname;
          })
          .catch(error => console.log(error));
    },
    getTodos() {
      axios.get('http://localhost:8000/todo/')
          .then(response => {
            console.log(response);
            this.todos = response.data;
          })
          .catch(error => console.log('error:', error));

    }
  }
}
</script>

<style scoped>
.title {
  color: green;
}
.concluido {
  background-color: #535bf2;
}
</style>
