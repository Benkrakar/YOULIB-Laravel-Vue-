<template>
    <div >
              <div class="container-fluid mt-4">
             <div class="row">
        <div class="col-md-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link to="/dashboard/table" active-class="active">
                  Tableau de bord
                </router-link>
              </li>
              <li class="breadcrumb-item active">Commandes</li>
            </ol>
          </nav>
        </div>
      </div>
	<div class="row">
		<div class="col-md-12">
               <div class="row">
        <div class="col-md-12 mt-5 category-table">
         <div class="col-md-12 table-products "  v-for="(categorie, index) in commande" :key="index">
           <table class="table ">
            <thead>
              <tr>
                <th scope="col">#</th>
                      <th scope="col">id</th>
                      <th scope="col">client name</th>
                      <th scope="col">client email</th>
                      <th scope="col">client adresse</th>
                      <th scope="col">totale</th>
                      <th scope="col">controle</th>
              </tr>
            </thead>
            <tbody>
              <tr  >
               <th scope="row ">1</th>
                      <td class="pt-3">{{categorie.id}}</td>
                      <td class="pt-3">{{categorie.client_name}}</td>
                      <td class="pt-3">{{categorie.client_email }}</td>
                      <td class="pt-3">{{categorie.client_adresse}}</td>
                      <td class="pt-3">{{categorie.totale}}</td>
                <td>
                    <b-button variant="danger">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                    <b-button variant="success">
                        <i class="fas fa-check-circle"></i>
                    </b-button>
                    <b-button v-b-toggle="'collapse'+index" class="m-1" variant="info" @click="get_commande_products(categorie.id)">
                       <i class="fas fa-check-circle fa-2x"></i>
                    </b-button>
                    
                </td>
              </tr>
            </tbody>
          </table>
            <div  class="accordion" role="tablist">
          <b-collapse   accordion="my-accordion" role="tabpanel" :id="'collapse'+index">
            <div class="col-md-12 table-products " >
             <table class="table table-striped">
            <thead  class="othman">
              <tr>
              
                   
                      <th scope="col">product nam</th>
                      <th scope="col">product quantity</th>
                      <th scope="col">product prix</th>
                      <th scope="col">total</th>
                    
              </tr>
            </thead>
            <tbody class="walid"  v-for="(w, index) in commandeproducts" :key="index" >
              <tr  >
                   
                      <td class="pt-3" >{{w.product_name}}</td>
                      <td class="pt-3" >{{w.product_price}}dh</td>
                      <td class="pt-3" >{{w.quentitie}}</td>
                      <td class="pt-3" >{{w.product_price * w.quentitie}}dh</td>
               
              </tr>
            </tbody>
          </table>
            </div>
          </b-collapse>
          </div>
        </div>
           
             
        </div>
      </div>
		</div>
	</div>
</div>
    </div>
</template>

<script>
import {mapGetters,  mapActions } from 'vuex';

    export default {
          computed:{
        ...mapGetters({
            commande:'commandes/commande',
            commandeproducts:'commandes/commande_products',
              products:'products/products',
        }),
    },
       created(){
          this.get_commande(),
          this.get_commande_products()
          this.get_product()
         
       
       },
        methods: {
         ...mapActions({
        
          get_commande:'commandes/get_commande',
          get_commande_products:'commandes/get_commande_products',
          get_product:'products/get_product',
      }),
    }
    }
</script>

<style scoped>
.messages {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    font-size: 40px;
    color: rgb(167, 167, 167);
    font-weight: 600;
}
</style>