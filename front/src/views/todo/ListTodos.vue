<template>
  <RouterLink to="/todos/create">Criar tarefa</RouterLink>
  <table border="1">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(todo, index) in todos" :key="index">
        <td>{{ todo.title }}</td>
        <td>{{ todo.description }}</td>
        <td>
          <button :style="[todo.status ? 'color:green;' : 'color:red;']" @click="updateStatus(todo.id)">
            {{ todo.status ? 'Concluido' : 'Não concluido' }}
          </button>
        </td>
        <td>
          <button @click="editTodo(todo.id)">Atualizar</button>
          <button @click="deleteTodo(todo.id)">delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import axios from "axios";
import Swal from 'sweetalert2';

export default {
  name: "ListTodos",
  data() {
    return {
      todos: []
    }
  },
  methods: {
    async getTodos() {
      axios.get('todo')
          .then(response => {
            this.todos = response.data
          })
          .catch(error => console.log(error));
    },
    deleteTodo(id) {
      axios.delete(`todo?id=${id}`)
          .then(response => {
            if(response.data.success) {
              this.getTodos();
            } else {
              Swal.fire({
                title: 'Error',
                text: 'Não foi possível deletar está tarefa'
              })
            }
          })
    },
    updateStatus(id) {
      axios.patch(`todo?id=${id}`)
          .then(response => {
            if(response.data.success) {
              this.getTodos();
            } else {
              Swal.fire({
                title: 'Error',
                text: 'Não foi possível atualizar está tarefa'
              })
            }
          })
          .catch(error => console.log(error));
    },
    editTodo(id) {
      this.$router.push({name: 'todoEdit', params: {id: id} });
    }
  },
  created() {
    this.getTodos();
  },
  mounted() {

  },
}
</script>

<style scoped>

</style>