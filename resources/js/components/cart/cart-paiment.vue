<template>
    <div>
        <div
            class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded" v-for="(car, index) in cart" :key="index"  
        >
            <div class="d-flex flex-row">
                  <td class=" user_img"> <img :src="`${$store.state.serverpath}/storage/${car.image}`" alt=""></td>
                <p class="mt-4 ml-2">produit : {{car.name}} </p>
                
                <p class="mt-4 ml-2">prix unitaire :{{car.price}}$</p>
                <div class="ml-2">
                    <span class="font-weight-bold d-block"
                        ></span
                    >
                    <span class="spec"></span>
                </div>
            </div >
            <div class="cart_control d-flex flex-row align-items-end ">
                <div class="d-flex ">
                 <button @click="deccontite(car)" >-</button>
                <input type="number" class="d-block qte" :value="car.quantity"  />
                <button @click="inccontite(car)">+</button>
                </div>
                <span class="d-block ml-5 font-weight-bold mr-3">
                    Totale:{{car.price * car.quantity}} $
                    </span>
                     <b-button variant="danger"  @click="delete_products(car)">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                </div>
        </div>
    </div>
</template>

<script>
import {mapMutations  ,mapGetters} from 'vuex';

export default {
     data : ()=>{
    return {
      carProducts : [],
     totale:''
    }
    },
      computed:{
           ...mapGetters({
            cart:'carte/cart',
        }),

        },
  created(){
      this.totalPrice()
     this.$emit('name', this.totale);
    //  this.$emit('name', this.totale);

    //  console.log(JSON.stringify(this.cart));
     

  },
        methods: {
       totalPrice(){
           let total = 0;

        for (let item of this.cart) {
            total += item.price*item.quantity;
        }
            this.totale = total;
      },
   
      ...mapMutations({
          
           removeItem:'carte/removeItem',
            ADD_TO_CART:'products/ADD_TO_CART',
      }),
     inccontite(car){
         if (car.quantity<car.quantite) {
             
             car.quantity++
             this.ADD_TO_CART(car)
             this.totalPrice()
              this.$emit('name', this.totale);
             return car.quantity
         }else{
             alert('ooooh')
         }
     },
         deccontite(car){
            car.quantity--
            this.ADD_TO_CART(car)
            this.totalPrice()
             this.$emit('name', this.totale);
            console.log(this.cart)
            return car.quantity
     },
      delete_products(car){
          //   localStorage.removeItem(car);
      
      this.removeItem(car);
      },
      
      },
   
       


  
   
       
    }

</script>

<style lang="css"></style>
