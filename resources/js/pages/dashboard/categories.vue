<template>
  <div>
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
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10">
          <h3></h3>
        </div>
        <div class="col-md-2 d-flex">
          <button type="button" class="btn btn-category"  v-on:click="showNewCategoryModal">
            <span class="fas fa-plus"></span> nouvelle categorie
          </button>
        </div>
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
              <tr v-for="(categorie, index) in categories" :key="index">
                <th scope="row ">{{categorie.id }}</th>
                <td class="pt-3">{{categorie.name }}</td>
                <td class="pt-3">Otto</td>
                <td>
                    <b-button variant="danger"  @click="delete_categorie(categorie.id)">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                    <b-button variant="success" @click="updatecategorie(categorie)"  >
                        <i class="fas fa-edit"></i>
                    </b-button>
                </td>
              </tr>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
     <b-modal  ref="NewCategoryModal" hide-footer title="Ajoute dune nouvelle categories">
        <div class="d-block text-center">
          <form v-on:submit.prevent="createCategory">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
              <input type="text" v-model="categoryData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du categorie">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideNewCategoryModal">Save</button>
          </form>
        </div>
    </b-modal>
    <b-modal  ref="EditCategoryModal" hide-footer title="Edite categorie">
        <div class="d-block text-center">
          <form v-on:submit.prevent="updatcategorie">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
              <input type="text" v-model="editcategoryData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du categorie">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideEditCategoryModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideEditCategoryModal">MAJ</button>
          </form>
        </div>
    </b-modal>
  </div>
</template>

<script>
import {mapGetters,  mapActions } from 'vuex';

export default {
  name :'category',

  data () {
    return {
      categoryData:{
        name: '',

      },
        editcategoryData:{
        name: '',

      }
    }
  },
     computed:{
        ...mapGetters({
            categories:'categories/categories',
        }),
      
          },
        created(){
        console.log("from qsdf app.vue");
      this.get_categories()
      //  this.$store.dispatch("categories/get_categories");
     },
  methods: {
      ...mapActions({
          creat_categorie:'categories/creat_categorie',
          get_categories:'categories/get_categories',
          update_categorie:'categories/update_categorie',
          delete_categorie:'categories/delete_categorie'
      }),
    
    updatecategorie(categorie){
      this.showEditCategoryModal()
      this.editcategoryData = categorie;
  
    },
  
     updatcategorie(){
         this.update_categorie(this.editcategoryData)
      //  console.log( this.editcategoryData.name)
    },
    hideNewCategoryModal(){
        this.$refs.NewCategoryModal.hide()
    },
     hideEditCategoryModal(){
        this.$refs.EditCategoryModal.hide()
    },
    showNewCategoryModal(){
        this.$refs.NewCategoryModal.show()
    },
     showEditCategoryModal(){
        this.$refs.EditCategoryModal.show()
    },
    createCategory() {
        this.creat_categorie(this.categoryData)
    },
   
 
  }
};
</script>
