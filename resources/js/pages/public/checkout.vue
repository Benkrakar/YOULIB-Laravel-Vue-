<template>
  <div>
    <Sidbar />
    <div class="mt-5 mb-5">
      <div class="cv-order-detail spacer-top-less spacer-bottom">
        <div class="container">
          <div class="cv-heading">
            <h1>product details</h1>
            <p>
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="cv-last-order">
                <table>
                  <thead>
                    <tr>
                      <th>Product name</th>
                      <th>unit price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>

                  <Checkout />
                </table>
              </div>
              <div class="cv-cart-btn d-flex justify-content-center mt-5">
                <button type="button" class="cv-btn" v-on:click="commander">
                  <span class="fas fa-check-square mr-3"></span>commander
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>
<script>
import Checkout from "../../components/checkout/commande.vue";
import Profile from "../../components/checkout/profile.vue";
import Sidbar from "../../components/public/navbar.vue";
import Footer from "../../components/public/footer.vue";
import { mapMutations, mapGetters, mapActions } from "vuex";

export default {
  data: () => {
    return {
      CommandeData: {
        product_name: "",
        product_price: "",
        quentitie: "",
        id_commande: "",
      },

      ids: [],
      quantity: [],
      carProducts: [],
      totale: "",
    };
  },

  components: {
    Checkout,
    Profile,
    Sidbar,
    Footer,
  },
  computed: {
    ...mapGetters({
      cart: "carte/cart",
    }),
    totalPrice() {
      let total = 0;
      for (let item of this.cart) {
        total += item.price * item.quantity;
      }
      this.totale = total;
    },
    inc() {},
  },
  created() {
    this.loop();
    this.commandeinfo();
  },
  methods: {
    ...mapActions({
      creat_commande: "commandes/creat_commande",
      creat_commande_products: "commandes/creat_commande_products",
    }),

    loop() {
      for (let index = 0; index < this.cart.length; index++) {
        this.ids.push(this.cart[index].id);
      }
      return this.ids;
    },
    commandeinfo() {
      let commande = window.localStorage.getItem("commande");
      commande = JSON.parse(commande);
      this.CommandeData.id_commande = commande.id;
      console.log(this.CommandeData.id_commande);
      return this.CommandeData.id_commande;
    },
    commander() {
      for (let index = 0; index < this.cart.length; index++) {
        this.ids.push(this.cart[index].id);
        this.CommandeData.product_name = this.cart[index].name;
        this.CommandeData.product_name = this.cart[index].name;
        this.CommandeData.product_price = this.cart[index].price;
        this.CommandeData.quentitie = this.cart[index].quantity;
        console.log(this.CommandeData);
         let commande = window.localStorage.getItem("commande");
      commande = JSON.parse(commande);
      this.CommandeData.id_commande = commande.id;
      console.log(this.CommandeData.id_commande);
        this.creat_commande_products(this.CommandeData);
        this.$swal({
          title: "La commande est bien recu",
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
        }).then(() => {
        this.removeCommande();

          window.location = "/home";
        });
      }
    },
    ...mapMutations({
      removeCommande: "commandes/removeCommande",
    }),
  },
};
</script>

<style lang="css">
</style>

