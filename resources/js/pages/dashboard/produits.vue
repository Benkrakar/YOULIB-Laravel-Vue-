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
              <li class="breadcrumb-item active">Produits</li>
            </ol>
          </nav>
        </div>
      </div>
	<div class="row">
		<div class="col-md-12">
      <div class="col-md-2 d-flex">
          <button type="button" class="btn btn-category"  v-on:click="showNewProductModal">
            <span class="fas fa-plus"></span> nouvelle produite
          </button>
        </div>
      <div class="row">
        <div class="col-md-12 mt-5 category-table">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">nombre de produits</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(product, index) in products" :key="index">
                <th scope="row ">{{product.id }}</th>
                <td class="pt-3">{{product.name }}</td>
                <td class="pt-3">Otto</td>
                <td>
                   <b-button variant="danger"  @click="delete_products(product.id)">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                    <b-button variant="success" @click="updatProducts(product)"  >
                        <i class="fas fa-edit"></i>
                    </b-button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
		</div>
	</div>
</div>
 <b-modal  ref="NewProductModal" hide-footer title="Ajoute dune nouvelle products">
        <div class="d-block text-center">
          <form v-on:submit.prevent="createProduct">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
              <input type="text" v-model="productsData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du produite">
              <input type="text" v-model="productsData.details" class="form-control" id="details"  name='details' placeholder="Entrer le nome du produite">
              <input type="text" v-model="productsData.price" class="form-control" id="price"  name='price' placeholder="price">
              <input type="file" class="form-control" v-on:change="setimage" ref="imageProduct" id="image" name="image" required autocomplete="image"> 
              <input type="text" v-model="productsData.quantite" class="form-control" id="quantite"  name='quantite' placeholder="Q">
              <input type="text" v-model="productsData.id_subcategorie" class="form-control" id="id_subcategorie"  name='id_subcategorie' placeholder="SUB">
              
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideNewProductModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideNewProductModal">Save</button>
          </form>
        </div>
    </b-modal>
    <b-modal  ref="EditProductModal" hide-footer title="Edite product">
        <div class="d-block text-center">
          <form v-on:submit.prevent="oop">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
             <input type="text" v-model="editproductsData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du produite">
              <input type="text" v-model="editproductsData.details" class="form-control" id="details"  name='details' placeholder="Entrer le nome du produite">
              <input type="text" v-model="editproductsData.price" class="form-control" id="price"  name='price' placeholder="price">
              <input type="file" class="form-control" v-on:change="setimageedit" ref="imageProduct" id="image" name="image" autocomplete="image"> 
              <input type="text" v-model="editproductsData.quantite" class="form-control" id="quantite"  name='quantite' placeholder="Q">
              <input type="text" v-model="editproductsData.id_subcategorie" class="form-control" id="id_subcategorie"  name='id_subcategorie' placeholder="SUB">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideEditProductModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideEditProductModal">MAJ</button>
          </form>
        </div>
    </b-modal>
    </div>
</template>

<script>
import {mapGetters,  mapActions } from 'vuex';

export default {
  name :'products',

  data () {
    return {
      productsData:{
        name: '',
        details: '',
        image: '',
        price: '',
        quantite:'',
        id_subcategorie:'',

      },
        editproductsData:{
           name: '',
        details: '',
        image: '',
        price: '',
        quantite:'',
        id_subcategorie:'',

      }
    }
  },
     computed:{
        ...mapGetters({
            products:'products/products',
        }),
        computed(){
          products:this.$store.getters['products/get_products']
        }
     },
     created(){
       this.get_products()
     },
  methods: {
      ...mapActions({
          creat_products:'products/creat_products',
          get_products:'products/get_products',
          update_products:'products/update_products',
          delete_products:'products/delete_products'
      }),
       setimage(){
       this.productsData.image = this.$refs.imageProduct.files[0]
     
      },
       setimageedit(){
       this.editproductsData.image = this.$refs.imageProduct.files[0]
     
      },
    // updatProducts(product){
    //   this.showEditProductModal()
     
    //   this.editproductsData = product;
    //    update_products( this.editproductsData)
    //   // console.log( this.editproductsData)
    //     //  this.update_product(this.editproductsData.id)
    // },
 
  
      updatProducts(product){
      this.showEditProductModal()
     this.editproductsData = product
    return this.editproductsData;
    },
       oop(){
         console.log('image',this.editproductsData)
         const df = new FormData()
         df.id = this.editproductsData.id
        df.append('id',this.editproductsData.id)
        df.append('image',this.editproductsData.image)
        df.append('name',this.editproductsData.name)
        df.append('price',this.editproductsData.price)
        df.append('details',this.editproductsData.details)
        df.append('quantite',this.editproductsData.quantite)
        df.append('id_subcategorie',this.editproductsData.id_subcategorie)
        console.log(this.editproductsData.id)
        this.update_products(df)
      },
    hideNewProductModal(){
        this.$refs.NewProductModal.hide()
    },
     hideEditProductModal(){
        this.$refs.EditProductModal.hide()
    },
    showNewProductModal(){
        this.$refs.NewProductModal.show()
    },
     showEditProductModal(){
        this.$refs.EditProductModal.show()
    },
    createProduct() {
         const df = new FormData()
        df.append('image',this.productsData.image)
        df.append('name',this.productsData.name)
        df.append('price',this.productsData.price)
        df.append('details',this.productsData.details)
        df.append('quantite',this.productsData.quantite)
        df.append('id_subcategorie',this.productsData.id_subcategorie)
       console.log( df)
        this.creat_products(df)
    },
   
 
  }
};
</script>

<style scoped>

</style>