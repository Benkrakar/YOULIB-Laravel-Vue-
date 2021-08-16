<template>
    <div>
         <section class="">
    <div class="container  ">
      <div class="row justify-content-center ">
        <div class="  pb-5 col-md-10 col-lg-12 ">
          <div >
            <h1 class="mb-3 title-home-carosel text-center">
              <span class="title-span">Nouveaux </span>Produits
            </h1>
          </div>
        
        </div>
      
       


            <div class="  col-lg-12 row justify-content-center">
                  <div class="cartes_shop mr-5 " v-for="(product, index) in paginated_products.data" :key="index">
                    <div class="content_shop">
                        <div class="content-overlay"></div>
                          <img class="content-image" :src="`${$store.state.serverpath}/storage/${product.image}`" alt="">                        <div class="content-details fadeIn-bottom">
                          <a class="m-2" href="#">
                            <i class="fas fa-heart fa-2x"></i>
                          </a>
                          <a class="m-2"  @click="ADD_TO_CART(product)">
                              <i class="fas fa-shopping-cart fa-2x" ></i>
                          </a>
                          <a class="m-2" href="#">
                            <i class="fas fa-eye fa-2x"></i>
                          </a>
                        </div>
                    </div>
                    <h4 class="title">{{product.name }}<br> {{product.price }} dh</h4>
                  </div>
                
                  
         
          
         
            
          </div>
      

      </div>
        <div class=" paginations d-flex justify-content-center  ">
    
              <pagination class="pagination" :data="paginated_products" @pagination-change-page="getResults">
              <span slot="prev-nav">&lt; Previous</span>
              <span slot="next-nav">Next &gt;</span>
          </pagination>
    </div>

    </div>
   

  </section>
    </div>
</template>

<script>
import {mapGetters,  mapActions , mapMutations} from 'vuex';

export default {
  name :'products',
   mounted() {
        this.getResults();
    },
     computed:{
        ...mapGetters({
            paginated_products:'products/paginated_products',
        }),
      
     },
     created(){
       this.get_product_paginated()
     },
  methods: {
      ...mapActions({
          get_product_paginated:'products/get_product_paginated',
      }),

      ...mapMutations({
          ADD_TO_CART:'products/ADD_TO_CART',
      }),
        getResults(page = 1) {
              this.get_product_paginated(page)
}

  }
};
</script>