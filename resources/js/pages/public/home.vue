<template>
  <div>      
    <Sidbar/>
    <Hero/>
    <Product/>
    <Impression/>  
    <BestSell/>
    <Services/>
    <Footer/>
  </div>
</template>

<script>
// import axios from 'axios';
import Paiment from '../../components/cart/cart-paiment.vue';
import Product from '../../components/home/product-home.vue';
import Hero from '../../components/home/hero-header.vue';
import Impression from '../../components/home/impression.vue';
import Services from '../../components/home/services.vue';
import BestSell from '../../components/home/best-sell.vue';
import Sidbar from '../../components/public/navbar.vue';
import Footer from '../../components/public/footer.vue';
export default {
  

  components:{
    Paiment,
    Sidbar,
    Footer,
    Product,
    Impression,
    Hero,
    Services,
    BestSell
  },
  

}
</script>

<style lang="css">
  
</style>