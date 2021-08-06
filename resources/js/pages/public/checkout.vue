<template>
    <div>
    <Sidbar/>
    <div class="mt-5 mb-5">
        
        <div class="cv-order-detail spacer-top-less spacer-bottom">
            <div class="container">
                <div class="cv-heading">
                    <h1>product details</h1>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <Checkout/>
            </div>
        </div>
    </div>
    <Footer/>
    </div>
</template>
<script>
// import axios from 'axios';
import Checkout from '../../components/checkout/commande.vue';
import Profile from '../../components/checkout/profile.vue';
import Sidbar from '../../components/public/navbar.vue';
import Footer from '../../components/public/footer.vue';
export default {
  

  components:{
    Checkout,
    Profile,
    Sidbar,
    Footer
  },
  

}
</script>

<style lang="css">
  
</style>