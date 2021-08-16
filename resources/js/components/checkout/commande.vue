<template>
  <tbody>
    <tr  v-for="product in cart" :key="product.id" >
      <td>
        {{ product.name }}
      </td>
      <td>{{ product.price }}$</td>
      <td>{{ product.quantity  }}</td>
      <td>{{ product.price *  product.quantity }}</td>
      
    </tr>
  </tbody>
</template>


<script>
import {mapActions  ,mapGetters} from 'vuex';

export default {
     data : ()=>{
    return {
     CommandeData:{
        id_product:'',
        quentitie:'',
      id_commande:1
      },
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
     this.send()
  
     

  },
        methods: {
            ...mapActions({
      creat_commande_products:'commandes/creat_commande_products',
      }),
       totalPrice(){
           let total = 0;

        for (let item of this.cart) {
            total += item.price*item.quantity;
        }
            this.totale = total;
      },
      send(product){
        // if(product){
        
        //         console.log(product)
        // this.CommandeData.id_product=product.id;
        // this.CommandeData.quentitie=product.quantity;

        //  this.creat_commande_products(this.CommandeData)
        // // return this.CommandeData
        // }
      },
      showNewCommandeModal(product){
     
      }
      },
   
       


  
   
       
    }

</script>

<style lang="css"></style>
