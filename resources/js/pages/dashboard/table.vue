<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 mt-3">
          <div class="row">
            <div class="pl-5 col-md-4">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tableau de bord</li>
              </ol>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-boxes fa-2x"></i>
                  <b-card-text class="mt-2">Produits</b-card-text>
                  <h2>{{ products.length }}</h2>
                </div>
              </b-card>
            </div>
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-shopping-bag fa-2x"></i>
                  <b-card-text class="mt-2">Commandes</b-card-text>
                  <h2>{{commandes.length}}</h2>
                </div>
              </b-card>
            </div>
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-users fa-2x"></i>
                  <b-card-text class="mt-2">utilisateurs</b-card-text>
                  <h2>{{ users.length }}</h2>
                </div>
              </b-card>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12 mt-5 category-table">
                <h3>les dernières commandes</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">adresse</th>
                      <th scope="col">status de livraison</th>
                      <th scope="col">date de commande</th>
                    </tr>
                  </thead>
                  <tbody
                    v-for="(commande, index) in commandes.slice(-5)"
                    :key="index"
                  >
                    <tr>
                      <th scope="row ">{{ commande.id }}</th>
                      <td class="pt-3">{{ commande.client_adresse }}</td>
                      <td class="pt-3">
                        {{
                          commande.status_commande == true
                            ? "la commande est livree"
                            : "la commande en cours de livraison"
                        }}
                      </td>
                      <td class="pt-3">{{ commande.created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 mt-5 category-table">
                <h3>les utilisateurs</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">nom</th>
                      <th scope="col">email</th>
                      <th scope="col">ville</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(profile, index) in users" :key="index">
                      <th scope="row ">{{ profile.id }}</th>
                      <th scope="row ">{{ profile.name }}</th>
                      <td class="">{{ profile.email }}</td>
                      <td class="">{{ profile.ville }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
  computed: {
    ...mapGetters({
      commandes: "commandes/commande",
      products: "products/products",
      users: "profiles/profiles",
    }),
  },
  created() {
    this.get_products(), this.get_profiles();
    this.get_commande();
  },
  methods: {
    ...mapActions({
      get_products: "products/get_products",
      get_profiles: "profiles/get_profiles",
      get_commande: "commandes/get_commande",
    }),
  },
};
</script>
<style scoped>
</style>