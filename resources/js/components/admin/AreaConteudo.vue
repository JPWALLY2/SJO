<template>
  <div id="areaConteudo">
    <img class="desktop" src="../../../img/img_fundo.png" alt="Fundo JEPAP" />
    <!-- <img class="mobile" src="../../../img/img_fundo1.png" alt="Fundo JEPAP" />
    <img class="mobile" src="../../../img/img_fundo2.png" alt="Fundo JEPAP" /> -->
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