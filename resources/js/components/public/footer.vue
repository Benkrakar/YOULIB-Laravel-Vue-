<template>
  <div>
    <div class="cv-footer cv-footer-two spacer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="cv-foot-box">
              <div>
                <a class="navbar-brand" href="#">YouShop</a>
              </div>
              <p class="text-left">
                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat quis nostrud
                exercitation ullamco laboris.
              </p>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="cv-foot-box cv-foot-links">
              <h2>Categories</h2>
              <ul>
                >
                <li v-for="(categorie, index) in categories" :key="index">
                  <router-link to="/all/" exact>
                    {{ categorie.name }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6"></div>
          <div class="col-lg-4 col-md-6">
            <div class="cv-foot-box pl-4 cv-foot-contact text-lg-left col-10">
              <h2 class="d-flex justify-content-center">Contact</h2>
              <p><span>Contact : </span>+55 456-789-9651</p>
              <p><span>Email : </span>example@exemple.com</p>
              <p><span>Address : </span>youssoufia, maroc</p>
              <ul class="cv-foot-social">
                <li>
                  <a href="#">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
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
      categories: "categories/categories",
    }),
    computed() {
      // products:this.$store.getters['products/get_products']
    },
  },
  created() {
    this.get_categorie();
  },
  methods: {
    ...mapActions({
      get_categorie: "categories/get_categories",
    }),
  },
};
</script>