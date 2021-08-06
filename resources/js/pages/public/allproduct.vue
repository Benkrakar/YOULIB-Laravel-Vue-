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
                                    <p><span>Total : </span>8</p>
                                </div>
                                <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                                    <div class="cv-gallery-grid">
                                      <Products/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cv-shop-sidebar">
                                <div class="cv-widget cv-search ">
                                    <h2 class="cv-sidebar-title">Product Search</h2>
                                    <form>
                                        <input class="pl-2" type="text" placeholder="Product Search"/>
                                        <button class="cv-btn">search</button>
                                    </form>
                                </div>
                                    
                                <div class="cv-widget cv-product-category">
                                    <h2 class="cv-sidebar-title">Categories</h2>
                                    <ul>
                                        <li><a href="javascript:;">Consectetur adipiscing elit</a></li>
                                        <li><a href="javascript:;">Quis nostrud exercitation</a></li>
                                        <li><a href="javascript:;">Duis aute irure dolor in repreh</a></li>
                                        <li><a href="javascript:;">Sunt in culpa officia deserunt</a></li>
                                        <li><a href="javascript:;">Ut enim ad minim veniam</a></li>
                                    </ul>
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
// import axios from 'axios';
import Products from '../../components/allproducts/products.vue';
import Sidbar from '../../components/public/navbar.vue';
import Footer from '../../components/public/footer.vue';
export default {
  

  components:{
    Products,
    Sidbar,
    Footer,
  },
  

}
</script>

<style lang="css">
  
</style>