<template>
    <div>
    <Sidbar/>
   <section class="singleproduct">
 
      <div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="row ">
				<div class="col-md-6  productImg">
					 <img class="content-image" :src="`${$store.state.serverpath}/storage/${products.image}`" alt="">
				</div>
				<div class="col-md-2 product">
                    <h1>
                       <strong> Nome : </strong>  {{products.name}}
                    </h1>
                    <h2 class="mt-5" v-if="products ">
                       <strong> Prix  </strong>  {{products.price }}DH
                        
                         
                    </h2>
					<p  class="mt-5">
						<strong> description : </strong>   {{products.details}}

					</p> 
					<button type="button" class="btn  cv-btn d-flex justify-content-center"  @click="ADD_TO_CART(products)">
						 <h3>ADD TO CART</h3> <i class="ml-2 fas fa-shopping-cart fa-2x"></i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
				</div>
				<div class="col-md-1">
				</div>
			</div>
             <div class="container mt-5">
          <div class="d-flex justify-content-center">
            <h1 class="mb-3 title-home ">
              <span class="title-span">Related </span>livres
            </h1>
          </div>
          <div class="row">
               
                    <div class="cartes_shop col-lg-3 col-sm-6 " v-for="(product, index) in related_products.slice(-4)" :key="index">
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
	</div>
</div>
        
      </section>
    <Footer/>

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
            related_products:'products/related_products',
        }),
       
     },
     created(){
          this.get_products()
            
     },
  methods: {
      ...mapActions({
          get_product:'products/get_product',
          get_related_product:'products/get_related_product',
         
      }),
 ...mapMutations({
          ADD_TO_CART:'products/ADD_TO_CART',
 
      }),
         get_products(){
             this.get_product(this.$route.params.id)
            setTimeout(() => {  this.get_related_product(this.products.id_subcategorie); }, 1000);
             
        },
        oo(products){
            console.log(products)
            // this.get_related_product(this.products.id)
        }
  },
}
</script>

<style lang="css">
  
</style>
