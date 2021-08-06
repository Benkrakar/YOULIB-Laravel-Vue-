<template>
  <div>
    <Sid/>
    <section class="container  mt-5 rounded  cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class=" product-details mr-2">
                    <div class="mt-5 d-flex justify-content-between"><h1 class="mb-0"> <span class="title-span">Shopping </span>cart</h1>
                        <div class="mt-4 d-flex justify-content-between">
                          <span>You have 4 items in your cart</span>
                        </div>
                    </div>
                    <!-- ///////// -->
                  
                  
                    <Paiment  :qte="44"/>
                    <!-- //////////// -->
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="payment-info  ">
                    <div class="d-flex justify-content-center align-items-center">
                      <h1 class="mb-0">
                         <span class="">Shopping </span>cart</h1>
                    </div>
                    <hr class="line ">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 d-">
                            <div class="dropdown">
                              <select class="custom-select" id="inputGroupSelect01">
                                <option value="1">COD</option>
     
                              </select>
                            </div>
                        </div>
                    </div>
                    <hr class="line">
                    <div class="d-flex justify-content-between information">
                      <span>Subtotal</span>
                      <span>{{totalCart}}$</span>
                    </div>
                    <div class="d-flex justify-content-between information">
                      <span>Shipping</span>
                      <span>${{shippingCost}}</span>
                    </div>
                    <div class="d-flex justify-content-between information">
                      <span>Total(Incl. taxes)</span>
                      <span>${{ mainTotalCart }}</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                    <button class="btn  btn-checkout  d-flex  justify-content-center mt-3" type="button ">Checkout</button>
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
import Paiment from '../../components/cart/cart-paiment.vue';
import Sid from '../../components/public/navbar.vue';
import Footer from '../../components/public/footer.vue';
export default {
  

  components:{
    Paiment,
    Sid,
    Footer
  },
  

}
</script>

<style lang="css">
  
</style>