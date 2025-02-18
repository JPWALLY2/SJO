<template>
  <div>
    <topo @navegar="componente"></topo>
    <div id="corpo">
      <menu-lateral class="menuDesktop"></menu-lateral>

      <area-conteudo :conteudo="componenteAtual"></area-conteudo>
    </div>
  </div>
</template>

<script>
import Topo from "@/components/admin/Topo.vue";
import MenuLateral from "@/components/admin/MenuLateral.vue";
import AreaConteudo from "@/components/admin/AreaConteudo.vue";
import FormularioUsuarios from "@/components/admin/usuarios/FormularioUsuarios.vue";

export default {
  name: "App",
  data() {
    return {
      componenteAtual: '',
    };
  },
  methods: {
    componente(p) {
      // Alternar entre abrir e fechar o componente
      this.componenteAtual = this.componenteAtual === p ? '' : p;
    },
  },
  components: {
    Topo,
    MenuLateral,
    AreaConteudo,
    FormularioUsuarios,
  },
};
</script>
