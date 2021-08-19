<template>
  <div>
    <Sid />
    <section class="container mt-5 rounded cart">
      <div class="row no-gutters">
        <div class="col-md-8">
          <div class="product-details mr-2">
            <div class="mt-5 d-flex justify-content-between">
              <h1 class="mb-0">
                <span class="title-span">Shopping </span>cart
              </h1>
              <div class="mt-4 d-flex justify-content-between">
                <span>You have 4 items in your cart</span>
              </div>
            </div>
            <!-- ///////// -->

            <Paiment @name="getName" @data="getData" />
          </div>
        </div>
        <!-- //////////// -->
        <div class="col-md-4">
          <div class="payment-info">
            <div class="d-flex justify-content-center align-items-center">
              <h1 class="mb-0"><span class="">Shopping </span>cart</h1>
            </div>
            <hr class="line" />

            <div class="row d-flex justify-content-center">
              <div class="col-md-10 d-">
                <div class="dropdown">
                  <select class="custom-select" id="inputGroupSelect01">
                    <option value="1">COD</option>
                  </select>
                </div>
              </div>
            </div>
            <hr class="line" />
            <div class="d-flex justify-content-between information">
              <span>Subtotal</span>
              <span>{{ total }}DH</span>
            </div>
            <div class="d-flex justify-content-between information">
              <span>Shipping</span>
              <span>20DH</span>
            </div>
            <div class="d-flex justify-content-between information">
              <span>Total(Incl. taxes)</span>
              <span>{{ total + 20 }}$</span>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <button
                type="button"
                class="btn cv-btn pb-4"
                v-on:click="showNewCommandeModal"
              >
                <span class="fas fa-check-square mr-3"></span>checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <Footer />
    <b-modal
      ref="NewCommandeModal"
      hide-footer
      title="Ajoute votre informations"
    >
      <div class="d-block text-center">
        <form v-on:submit.prevent="createCommande">
          <div class="form-group">
            <input
              type="text"
              v-model="CommandeData.client_name"
              class="form-control"
              id="client_name"
              name="client_name"
              placeholder="Entrer votr nome"
              required
            />
            <input
              type="email"
              v-model="CommandeData.client_email"
              class="form-control"
              id="client_email"
              name="client_email"
              placeholder="Entrer votr email"
              required
            />
            <input
              type="text"
              v-model="CommandeData.client_phone"
              class="form-control"
              id="client_phone"
              name="client_phone"
              placeholder="Entrer votr phone"
              required
            />
            <input
              type="text"
              v-model="CommandeData.client_adresse"
              class="form-control"
              id="client_adresse"
              name="client_adresse"
              placeholder="Entrer votr adresse"
              required
            />
          </div>
          <hr />
          <button
            type="button"
            class="btn btn-default"
            v-on:click="hideNewCommandeModal"
          >
            Exit
          </button>
          <button
            type="submit"
            class="btn btn-primary"
            v-on:click="hideNewCommandeModal && save()"
          >
            Save
          </button>
        </form>
      </div>
    </b-modal>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

import Paiment from "../../components/cart/cart-paiment.vue";
import Sid from "../../components/public/navbar.vue";
import Footer from "../../components/public/footer.vue";
import store from "../../store/store.js";

export default {
  data: () => {
    return {
      cart: "",
      total: "",
       editproductsData: {
        id: "",
        name: "",
        details: "",
        image: "",
        price: "",
        quantite: "",
        id_subcategorie: "",
      },
      CommandeData: {
        client_name: "",
        client_email: "",
        client_phone: "",
        client_adresse: "",
        totale: "",
      },
    };
  },
  created() {
    this.getData();
    this.getName();
    window.onload = this.reload();
    //  console.log( this.commandeData.quantite)
  },

  methods: {
    ...mapActions({
      creat_commande: "commandes/creat_commande",
       update_qttproducts: "products/update_qttproducts",
    }),
    getName(value) {
      console.log(value);
      this.total = value;
    },
     getData(value) {
       console.log(value);
      this.editproductsData = value;
       console.log(value);
    },
    createCommande() {
      console.log(this.editproductsData);
      
        this.update_qttproducts(this.editproductsData);
      this.CommandeData.totale = this.total;
      this.creat_commande(this.CommandeData);
    },
    hideNewCommandeModal() {
      this.$refs.NewCommandeModal.hide();
    },

    showNewCommandeModal() {
    
      
      this.$refs.NewCommandeModal.show();
    },
    reload() {
      if (!window.location.hash) {
        window.location = window.location + "#";
        window.location.reload();
      }
    },
    save() {
      if (client_name != null) {
        this.$swal({
          title: "Done!",
          text: "Message!",
          type: "success",
        }).then(() => {
          window.location = "/checkout";
        });
      }
    },
  },
  components: {
    Paiment,
    Sid,
    Footer,
  },
};
</script>

<style lang="css">
</style>