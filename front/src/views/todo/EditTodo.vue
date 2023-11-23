<template>
  <form @submit.prevent="updateTodo()">
    <fieldset>
      <legend>Edite sua tarefa</legend>
      <div>
        <label>Title</label>
        <input v-model="title">
      </div>
      <div>
        <label>Description</label>
        <input v-model="description">
      </div>
      <button>Editar</button>
    </fieldset>
  </form>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "EditTodo",
  data() {
    return {
      id: this.$route.params.id,
      title: null,
      description: null
    }
  },
  methods: {
    async getTodo() {
      axios.get(`todo?id=${this.id}`)
          .then(response => {
            this.title = response.data[0].title;
            this.description = response.data[0].description;
          })
          .catch(error => console.log(error));
    },
    updateTodo() {
      axios.put('/todo', {
        id: this.id,
        title: this.title,
        description: this.description
      })
          .then(response => {
            if(response.data.success) {
              this.$router.push('/todos');
            } else {
              Swal.fire({
                title: 'Error',
                text: 'Não foi possível atualizar está tarefa'
              })
            }
          })
    }
  },
  created() {
    this.getTodo();
  }
}
</script>

<style scoped>

</style>