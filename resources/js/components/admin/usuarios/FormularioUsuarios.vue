<template>
  <div id="cadastrar" class="container50 container-m-90">
    <div class="titulo">
      <h1 v-if="novoUsuario">Cadastrar Usuários</h1>
    </div>

    <form @submit.prevent="cadastrar">
      <div class="linha">
        <label for="nome">Nome</label>
        <Field name="nome" v-slot="{ field, errorMessage }" rules="required">
          <input type="text" id="nome" v-bind="field" />
          <span v-if="errorMessage" class="erro">{{ errorMessage }}</span>
        </Field>
      </div>

      <div class="linha">
        <label for="email">Email</label>
        <Field
          name="email"
          v-slot="{ field, errorMessage }"
          rules="verificarEmail"
        >
          <input type="text" id="email" v-bind="field" />
          <span v-if="errorMessage" class="erro">{{ errorMessage }}</span>
        </Field>
      </div>

      <div class="linha">
        <div class="coluna">
          <label for="senha">Senha</label>
          <Field
            name="senha"
            v-slot="{ field, errorMessage }"
            rules="required|min:6"
          >
            <input type="password" id="senha" v-bind="field" />
            <span v-if="errorMessage" class="erro">{{ errorMessage }}</span>
          </Field>
        </div>

        <div class="coluna">
          <label for="confirmar_senha">Confirmar Senha</label>
          <Field
            name="confirmarSenha"
            v-slot="{ field, errorMessage }"
            :rules="`required|confirmed:${form.senha}`"
          >
            <input type="password" id="confirmar_senha" v-bind="field" />
            <span v-if="errorMessage" class="erro">{{ errorMessage }}</span>
          </Field>
        </div>
      </div>

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</template>
<script>
import { useForm, Field } from "vee-validate";
import * as yup from "yup";
import axios from "axios";

export default {
  components: { Field },

  setup() {
    const schema = yup.object({
      nome: yup.string().required("O nome é obrigatório"),
      email: yup
        .string()
        .email("Digite um email válido")
        .required("O email é obrigatório")
        .test(
          "email-disponivel",
          "Este email já está cadastrado",
          async (value) => {
            if (!value) return false;
            try {
              const response = await axios.post("/api/verificarEmail", {
                email: value,
              });
              // Se já existe, retorna falso
              return !response.data.existe;
            } catch (error) {
              console.error("Erro ao validar email:", error);
              return false;
            }
          }
        ),
      senha: yup
        .string()
        .min(6, "A senha deve ter no mínimo 6 caracteres")
        .required("A senha é obrigatória"),
      confirmarSenha: yup
        .string()
        .oneOf([yup.ref("senha")], "As senhas não coincidem")
        .required("Confirme sua senha"),
    });

    const { handleSubmit, defineField } = useForm({ validationSchema: schema });

    const [nome] = defineField("nome");
    const [email] = defineField("email");
    const [senha] = defineField("senha");
    const [confirmarSenha] = defineField("confirmarSenha");

    const cadastrar = handleSubmit(async (values) => {
      try {
        await axios.post("/api/usuarios/cadastrar", values);
        alert("Usuário cadastrado com sucesso!");
      } catch (error) {
        console.error(error);
      }
    });

    return { form: { nome, email, senha, confirmarSenha }, cadastrar };
  },
};
</script>

<style>
.erro {
  color: red;
  font-size: 12px;
}
</style>
