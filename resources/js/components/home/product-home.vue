<template>
    <div>
        <div class="container">
          <div class="d-flex justify-content-center">
            <h1 class="mb-3 title-home ">
              <span class="title-span">Nouveaux </span>livres
            </h1>
          </div>
          <div class="row">
               
                    <div class="cartes_shop col-lg-3 col-sm-6 " v-for="(product, index) in products.slice(-8)" :key="index">
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
                                 <router-link :to="{ name:'single', params:{id:product.id}}">  <i class="fas fa-eye fa-2x"></i></router-link>
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
        </div>
    </div>
</template>

<script>
import {mapGetters,  mapActions,mapMutations } from 'vuex';

export default {
  name :'products',
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
         
      }),

     ...mapMutations({
          ADD_TO_CART:'products/ADD_TO_CART',
 
      }),
  }
};
</script>
