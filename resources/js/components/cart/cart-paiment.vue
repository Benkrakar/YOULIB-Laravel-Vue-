<template>
    <div>
        <div
            class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded" v-for="(car, index) in carProducts" :key="index"  
        >
            <div class="d-flex flex-row">
                <h1>{{car.id}}fez</h1>
                {{car.name}}
                
                <div class="ml-2">
                    <span class="font-weight-bold d-block"
                        ></span
                    >
                    <span class="spec"></span>
                </div>
            </div >
            <div class="cart_control d-flex flex-row align-items-end ">
                <div class="d-flex ">
                <button >-</button>
                <input type="number" class="d-block qte" />
                <button >+</button>
                </div>
                <span class="d-block ml-5 font-weight-bold mr-3">
                    Totale: $
                    </span>
                <a href="#"><i class="fas fa-trash  text-black-50"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters,  mapActions } from 'vuex';

export default {
     data : ()=>{
    return {
      carProducts : [],
     
    }
    },
      computed:{
           getCartData(){
                let cart= window.localStorage.getItem('cart') 
                cart = JSON.parse(window.localStorage.getItem('cart'))
               this.carProducts = cart
           }
        },
        created(){
    
  
    this.getCartData()
  },
        methods: {
      ...mapActions({
          get:'products/GET',
      })
      },
   
       

    data: () => {
        return {
            name: '',
            details: '',
            image: '',
            price: '',
            quantite:'',
            totalCart: 0.0
        };
    },

  
   
       
    }

</script>

<style lang="css"></style>
