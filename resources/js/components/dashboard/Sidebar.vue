<template>
  <div class="sidebar">
    <div class="title ml-4">
      Hid {{user? user.name:''}}
     
    </div>
    <div class="col-md-4 text-right">
      <a
        @click.prevent="logout"
        class="pr-5 fas fa-sign-out-alt fa-2x text-right"
        >qsdfqsdfqs</a
      >
    </div>
    <div class="menu-items">
      <router-link
        to="/dashboard/table"
        active-class="active d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-tachometer-alt fa-2x"></i>
        </div>
        <div class="link-container pt-1">Tableau de bord</div>
      </router-link>
      <router-link
        to="/dashboard/categories"
        active-class="active  d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-folder fa-2x"></i>
        </div>
        <div class="link-container pt-1">Categories</div>
      </router-link>
      <router-link
        to="/dashboard/produits"
        active-class="active  d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-boxes fa-2x"></i>
        </div>
        <div class="link-container pt-1">Produits</div>
      </router-link>
      <router-link
        to="/dashboard/commandes"
        active-class="active  d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-shopping-bag fa-2x"></i>
        </div>
        <div class="link-container pt-1">Commandes</div>
      </router-link>
      <router-link
        to="/dashboard/profile"
        active-class="active  d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-users fa-2x"></i>
        </div>
        <div class="link-container pt-1">utilisateurs</div>
      </router-link>
      <router-link
        to="/dashboard/settings"
        active-class="active  d-flex justify-content-around"
        tag="button"
        exact
        class="side-btn"
      >
        <div>
          <i class="fas fa-cog fa-2x"></i>
        </div>
        <div class="link-container pt-1">Paramètres</div>
      </router-link>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/user",
    }),
  },

  methods: {
    ...mapActions({
      logoutAction: "auth/logout",
    }),
    logout() {
      this.logoutAction().then(() => {
        this.$router.replace({
          name: "login",
        });
      });
    },
  },
  async created() {
    // console.log("from cretated app.vue");
    this.$store.dispatch("auth/attempt", localStorage.getItem("token"));
  },
};
</script>

<style scoped>
</style>