<template>
    <div>
    <Sidbar/>
    <section class="all-page">
        <div class="cv-main-wrapper"> 
            <div class="cv-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cv-shop-box">
                                <div class="cv-shop-title">
                                    <h2 class="cv-sidebar-title">Showing results</h2>
                                    <p><span>Total : </span>{{products.length}}</p>
                                </div>
                                <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                                    <div class="cv-gallery-grid">
                                     <div class="cartes_shop mr-5 " v-for="(product, index) in products" :key="index">
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
                              
                                <router-link :to="{ name:'single', params:{id:product.id}}">  <i class="fas fa-eye fa-2x"></i></router-link>
                                  
                          
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
                        </div>
                        <div class="col-lg-4">
                            <div class="cv-shop-sidebar">
                              
                                    
                                <div class="cv-widget cv-product-category">
                                    <h2 class="cv-sidebar-title">Categories</h2>
                                    <ul v-for="(categorie, index) in categories" :key="index">
                                        <ul >{{categorie.name}}
                                            
                                         <ul v-for="subcategorie in categorie.subcategories" :key="subcategorie.id">
                                           
                                               <li  @click="get_product_subcategorie(subcategorie.id)">
                                                   <router-link
                              to="/all"
                              exact
                              class="nav-link "
                            >
                {{subcategorie.name}}
                  </router-link>
                                                 </li>
                                         </ul>
                                        </ul>
                                       
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

    </div>
</template>

<script>
import {mapGetters,  mapActions,mapMutations } from 'vuex';
import Sidbar from '../../components/public/navbar.vue';
import Footer from '../../components/public/footer.vue';
export default {
  

  components:{
    Sidbar,
    Footer,
  },
     computed:{
        ...mapGetters({
           products:'products/products',
               categories:'subcategories/subcategories',

        }),
       
     },
     created(){
          this.get_products(),
        this.get_subcategories()
        if (this.$route.params.id != null) {
            
            this.get_products_subcategorie()
        }

        // console.log(this.subcategories)
     },
  methods: {
      ...mapActions({
            get_product_subcategorie:'products/get_product_subcategorie',
            get_products:'products/get_products',
            get_subcategories:'subcategories/get_subcategories',
      }),

...mapMutations({
          ADD_TO_CART:'products/ADD_TO_CART',
 
      }),
       get_products_subcategorie(){
             this.get_product_subcategorie(this.$route.params.id)
        },
}
}
</script>

<style lang="css">
  
</style>