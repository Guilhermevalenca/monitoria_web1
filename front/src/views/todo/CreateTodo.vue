<template>
  <form @submit.prevent="submit()">
    <fieldset>
      <legend>Dados do formulário</legend>
      <div>
        <label>Title</label>
        <input v-model="todo.title">
      </div>
      <div>
        <label>description</label>
        <input v-model="todo.description">
      </div>
      <button>Criar tarefa</button>
    </fieldset>
  </form>
</template>

<script>
import axios from "axios";
import router from "@/router";
import Swal from "sweetalert2";

export default {
  name: "CreateTodo",
  data() {
    return {
      todo: {
        title: null,
        description: null
      }
    }
  },
  methods: {
    submit() {
      axios.post('todo', this.todo)
          .then(response => {
            if(response.data.success) {
              router.push('/todos');
            } else {
              console.log(response);
              Swal.fire({
                title: 'Error',
                text: 'Não foi possível criar sua tarefa'
              })
            }
          })
          .catch(error => console.log(error));
    }
  }
}
</script>

<style scoped>

</style>