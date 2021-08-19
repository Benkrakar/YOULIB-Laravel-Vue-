<template>
  <div>
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-md-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link to="/dashboard/table" active-class="active">
                  Tableau de bord
                </router-link>
              </li>
              <li class="breadcrumb-item active">Commandes</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12 mt-5 category-table">
              <div
                class="col-md-12 table-products"
                v-for="(categorie, index) in commande.data"
                :key="index"
              >
                <table class="table">
                  <thead>
                    <tr>
                    
                      <th scope="col">#</th>
                      <th scope="col">client name</th>
                      <th scope="col">client email</th>
                      <th scope="col">client adresse</th>
                      <th scope="col">status de livraison</th>
                      <th scope="col">totale</th>
                      <th scope="col">controle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                 
                      <td class="pt-3">{{ categorie.id }}</td>
                      <td class="pt-3">{{ categorie.client_name }}</td>
                      <td class="pt-3">{{ categorie.client_email }}</td>
                      <td class="pt-3">{{ categorie.client_adresse }}</td>
                      <td class="pt-3">
                        {{
                          categorie.status_commande == true
                            ? "la commande est livree"
                            : "la commande en cours de livraison"
                        }}
                      </td>

                      <td class="pt-3">{{ categorie.totale }}</td>
                      <td>
                        <b-button variant="danger">
                          <i
                            class="fas fa-trash-alt"
                            @click="delete_commandes(categorie)"
                          ></i>
                        </b-button>
                        <b-button
                          v-b-toggle="'collapse' + index"
                          class="m-1"
                          variant="info"
                          @click="get_commande_products(categorie.id)"
                        >
                         details
                        </b-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="accordion" role="tablist">
                  <b-collapse
                    accordion="my-accordion"
                    role="tabpanel"
                    :id="'collapse' + index"
                  >
                    <div class="col-md-12 table-products">
                      <table class="table table-striped">
                        <thead class="othman">
                          <tr>
                            <th scope="col">product nam</th>
                            <th scope="col">product quantity</th>
                            <th scope="col">product prix</th>
                            <th scope="col">total</th>
                          </tr>
                        </thead>
                        <tbody
                          class="walid"
                          v-for="(w, index) in commandeproducts"
                          :key="index"
                        >
                          <tr>
                            <td class="pt-3">{{ w.product_name }}</td>
                            <td class="pt-3">{{ w.product_price }}dh</td>
                            <td class="pt-3">{{ w.quentitie }}</td>
                            <td class="pt-3">
                              {{ w.product_price * w.quentitie }}dh
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </b-collapse>
                </div>
              </div>

              <div class="paginations d-flex justify-content-center">
                <pagination
                  class="pagination"
                  :data="commande"
                  @pagination-change-page="getResults"
                >
                  <span slot="prev-nav">&lt; Previous</span>
                  <span slot="next-nav">Next &gt;</span>
                </pagination>
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
  mounted() {
    this.getResults();
  },
  computed: {
    ...mapGetters({
      commande: "commandes/commande",
      commandeproducts: "commandes/commande_products",
      products: "products/products",
    }),
  },
  created() {
    this.get_commandes_paginated(), this.get_commande_products();
    this.get_product();
  },
  methods: {
    ...mapActions({
      delete_commande: "commandes/delete_commande",
      get_commande: "commandes/get_commande",
      get_commandes_paginated: "commandes/get_commandes_paginated",
      get_commande_products: "commandes/get_commande_products",
      get_product: "products/get_product",
    }),
    getResults(page = 1) {
      this.get_commandes_paginated(page);
    },
    delete_commandes(categorie) {
      this.$swal({
        title: "Are you sure?",
        text: "You won't to delte this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.delete_commande(categorie.id);
          this.$swal("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
};
</script>

<style scoped>
.messages {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  font-size: 40px;
  color: rgb(167, 167, 167);
  font-weight: 600;
}
</style>