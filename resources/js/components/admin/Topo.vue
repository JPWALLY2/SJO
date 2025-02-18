<template>
  <header>
    <nav id="topo" class="col-12">
      <div class="area-brand">
        <div class="area-logo">
          <img src="../../../img/logo.png" alt="Logo JEPAP" class="" />
        </div>
        <div class="area-titulo some-mobile">
          <h1>ADMIN</h1>
        </div>
      </div>

      <div class="top-nav">
        <input
          id="menu-toggle"
          type="checkbox"
          @click="navegarPara('MenuLateral')"
        />
        <label class="menu-button-container" for="menu-toggle">
          <div class="menu-button"></div>
        </label>
      </div>

      <!-- usuarios -->
      <div class="area-item some-mobile" @click="showDropUsuarios">
        <div class="usuario-icone">
          <img src="../../../img/usuarios.png" alt="Usuários" />
        </div>

        <div class="usuario-texto">
          <h2>Usuários</h2>
          <img
            src="../../../img/seta_baixo.png"
            :class="['seta', { rotate: mudarSeta }]"
          />
        </div>

        <div v-show="DropContUsuarios" class="drop-topo">
          <ul>
            <li>
              <router-link to="/usuarios/cadastrar">
                <a >Cadastrar</a>
              </router-link>
            </li>
            <li>
              <a href="#">Listar</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- configurações -->
      <div class="area-item some-mobile">
        <div class="conf-icone">
          <img src="../../../img/config.png" alt="Configurações" />
        </div>
        <div class="conf-texto">
          <h2>Configurações</h2>
        </div>
      </div>

      <!-- sair -->
      <div class="area-sair some-mobile">
        <div class="sair-texto">
          <h2>Sair</h2>
        </div>
        <div class="sair-icone">
          <img src="../../../img/sair.png" alt="Configurações" />
        </div>
      </div>

      <!-- todas conf -->
      <div class="todasConf">
        <img
          @click="showDropConfigs"
          src="../../../img/config.png"
          :class="['', { rotate2: rotate }]"
        />
        <div class="dropdownConf" v-show="dropContConf">
          <div class="usuario-texto conf-user" @click="showDropUsuarios2">
            <div class="div">
              <h2>Usuários</h2>
              <img
                src="../../../img/seta_baixo.png"
                :class="['seta2', { rotate: mudarSeta2 }]"
              />
            </div>
            <div :class="['drop-topo', { apareceDrop: mover }]">
              <ul>
                <li>
                  <!-- <li @click="navegarPara('CadastrarUsuarios')"> -->
                  <router-link to="/usuarios/cadastrar">
                    <a @click="showDropConfigs">Cadastrar</a>
                  </router-link>
                </li>
                <li>
                  <a>Listar</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="usuario-texto">
            <h2>Configurações</h2>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- <li v-for="(time, id) in times" :key="id">
    {{ id }} - {{ time.nome }}
</li> -->
</template>

<script>
export default {
  name: "Topo",
  data() {
    return {
      DropContUsuarios: false, // Inicialmente, o dropdown está oculto
      mudarSeta: false, // Inicialmente, a classe CSS não está ativada
      mudar2: false,
      mudarConf: false,
      dropContConf: false,
      mover: false,
      rotate: false,
      mudarSeta2: false,

      // passar os dados
      // times: window.appData.times,
      // times: JSON.parse(document.getElementById('app').getAttribute('data-times'))
    };
  },

  methods: {
    showDropUsuarios() {
      this.DropContUsuarios = !this.DropContUsuarios; // Muda o dropdown
      this.mudarSeta = !this.mudarSeta; // Altera o estado da seta
    },
    showDropConfigs() {
      this.dropContConf = !this.dropContConf;
      this.rotate = !this.rotate;
    },
    showDropUsuarios2() {
      this.mudarSeta2 = !this.mudarSeta2; // Muda o dropdown
      this.mover = !this.mover; // Altera o estado da seta
    },
    navegarPara(p) {
      this.$emit("navegar", p);
      // localStorage.setItem("comp", JSON.stringify(p));
    },
  },
};
</script>
