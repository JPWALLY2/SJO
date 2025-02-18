<template>
  <div id="cadastrar" class="container50 container-m-90">
    <div class="titulo">
      <h1 v-if="novoUsuario">Cadastrar Usuarios</h1>
    </div>

      <form @submit.prevent="cadastrar">
      <div class="linha">
        <label for="nome">Nome</label>
        <input type="text" id="nome" v-model="form.nome"/>
      </div>

      <div class="linha">
        <label for="email">Email</label>
        <input type="text" id="email" v-model="form.email" />
      </div>

      <div class="linha">
        <label for="senha">Senha</label>
        <input type="password" id="senha" v-model="form.senha" />
      </div>

      <div class="linha">
        <label for="comfirmar_senha">Comfirmar Senha</label>
        <input
          type="password"
          id="comfirmar_senha"
          v-model="form.confirmarSenha"
        />
      </div>

      <button type="submit">Cadastrar</button>
    </Form>
  </div>
</template>
  
  <script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        nome: "",
        senha: "",
        email: "",
        confirmarSenha: "",
      },
    };
  },

  computed: {
    novoUsuario() {
      return !this.$route.path.includes("editar");
    },
  },
  async created() {
    if (!this.novoUsuario) {
      const response = await axios.get(`usuarios/${this.$route.params.id}`);
      this.form = response.data;
    }
  },

  methods: {
    async cadastrar() {
      try {

          if (this.novoUsuario) {
            await axios.post("/usuarios/cadastrar", this.form);
          } else {
            await axios.put(`/usuarios/${this.$route.params.id}`, this.form);
          }
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>