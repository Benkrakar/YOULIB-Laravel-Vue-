<template>
    <div>
              <div class="cartes_shop col-lg-3 col-sm-6 " v-for="(product, index) in products.slice(-4)" :key="index">
                        <div class="content_shop">
                            <div class="content-overlay"></div>
                           <img class="content-image" :src="`${$store.state.serverpath}/storage/${product.image}`" alt="">
                            <div class="content-details fadeIn-bottom">
                                <a class="m-2" href="#">
                                    <i class="fas fa-heart fa-2x"></i>
                                </a>
                                <a class="m-2"   @click="ADD_TO_CART(product)">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                </a>
                                <a class="m-2" href="#">
                                    <i class="fas fa-eye fa-2x"></i>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h4 class="mb-3  ">
                                <span class="">{{product.name }}</span>
                                <br> {{product.price }} DH
                            </h4>
                        </div>
                    </div>
    </div>
</template>
<script>
import {mapGetters,  mapActions } from 'vuex';

export default {
     computed:{
        ...mapGetters({
            products:'products/products',
        }),
       
     },
     created(){
       this.get_products()
     },
  methods: {
      ...mapActions({
          get_products:'products/get_products',
          ADD_TO_CART:'products/ADD_TO_CART',
      }),

   
  }
};
</script>
</script>