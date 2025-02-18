<template>
  <div id="areaConteudo">
    <img src="../../../img/img_fundo.png" alt="Fundo JEPAP" />
    <div class="vidro"></div>

    <keep-alive>
      <component :is="conteudo"></component>
    </keep-alive>

    <router-view></router-view>
  </div>
</template>
  
  <script>
import MenuLateral from "./MenuLateral.vue";

export default {
  name: "AreaConteudo",
  components: {
    MenuLateral,
  },
  props: {
    conteudo: {
      type: String,
      required: true,
    },
  },

};
</script>