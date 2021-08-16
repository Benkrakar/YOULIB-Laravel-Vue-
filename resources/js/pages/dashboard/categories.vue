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
        <div class="col-md-2 d-flex">
          <button type="button" class="btn btn-category"  v-on:click="showNewSubcategoryModal">
            <span class="fas fa-plus"></span> nouvelle subcategorie
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
                <th scope="col">nombre des subcategories</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(categorie, index) in categories" :key="index">
                <th scope="row ">{{categorie.id }}</th>
                <td class="pt-3">{{categorie.name }}</td>
                <td class="pt-3">{{categorie.subcategories && categorie.subcategories != undefined && categorie.subcategories.length}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<div class="col-md-12 mt-5 categories-collaps"> 
                  <!-- Via multiple directive modifiers -->
                  <b-button v-b-toggle.collapse-a>{{categories[0].name}}</b-button>
                   <b-button v-b-toggle="'collapse-b '">{{categories[1].name}}</b-button>
                   <b-button v-b-toggle="'collapse-c '">{{categories[2].name}}</b-button>
                  <!-- Elements to collapse -->
                  <!-- <b-collapse id="collapse-a" class="mt-2"  v-for="subcategorie in categorie.subcategories" :key="subcategorie.id">
                    <b-card >{{subcategorie.id}}</b-card>
                    <b-card >{{subcategorie.name}}</b-card>
                    <b-card >{{categorie.name}}</b-card>
                  </b-collapse> -->
                  <b-collapse  id="collapse-a" class="collaps mt-2">
                    <h2>{{categories[0].subcategories.length > 0 ? '' : 'la liste est vide'}}</h2>
                      <div >
                            <table class="table table-striped">
                        <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">nome</th>
                            
                              <th scope="col">operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr   v-for="subcategorie in categories[0].subcategories" :key="subcategorie.id">
                            <th scope="row ">{{subcategorie.id}}</th>
                            <td class="pt-3">{{subcategorie.name }}</td>
                           
                            <td>
                                <b-button variant="danger"  @click="delete_subcategorie(subcategorie.id)">
                                    <i class="fas fa-trash-alt"></i>
                                </b-button>
                                <b-button variant="success" @click="updatesubcategorie(subcategorie)"  >
                                    <i class="fas fa-edit"></i>
                                </b-button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </b-collapse>
                    <b-collapse id="collapse-b" class="collaps mt-2">
                      <h2>{{categories[1].subcategories.length > 0 ? '' : 'la liste est vide'}}</h2>
                      <div >
                          <table class="table table-striped">
                        <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">nome</th>
                            
                              <th scope="col">operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr  v-for="subcategorie in categories[1].subcategories" :key="subcategorie.id">
                            <th scope="row ">{{subcategorie.id}}</th>
                            <td class="pt-3">{{subcategorie.name }}</td>
                           
                            <td>
                                <b-button variant="danger"  @click="delete_subcategorie(subcategorie.id)">
                                    <i class="fas fa-trash-alt"></i>
                                </b-button>
                                <b-button variant="success" @click="updatesubcategorie(subcategorie)"  >
                                    <i class="fas fa-edit"></i>
                                </b-button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </b-collapse>
                     
                    <b-collapse id="collapse-c" class="collaps mt-2">
                     <h2>{{categories[2].subcategories.length > 0 ? '' : 'la liste est vide'}}</h2>
                      <div >
                           <table class="table table-striped">
                        <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">nome</th>
                            
                              <th scope="col">operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr  v-for="subcategorie in categories[2].subcategories" :key="subcategorie.id">
                            <th scope="row ">{{subcategorie.id}}</th>
                            <td class="pt-3">{{subcategorie.name }}</td>
                           
                            <td>
                                <b-button variant="danger"  @click="delete_subcategorie(subcategorie.id)">
                                    <i class="fas fa-trash-alt"></i>
                                </b-button>
                                <b-button variant="success" @click="updatesubcategorie(subcategorie)"  >
                                    <i class="fas fa-edit"></i>
                                </b-button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                  </b-collapse>
                </div>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
                
      <!-- <div class="row" v-for="(categorie, index) in categories" :key="index">
      <div class="col-md-12 mt-5 category-table" v-if="categorie.subcategories.length > 0">
        <h1>{{categorie.name}} has {{categorie.subcategories.length}} {{categorie.subcategories.length > 1 ? 'subCategories' : 'subCategorie'}}</h1>        
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
            <tr v-for="subcategorie in categorie.subcategories" :key="subcategorie.id">
              <th scope="row ">{{subcategorie.id}}</th>
              <td class="pt-3">{{subcategorie.name }}</td>
              <td class="pt-3" >{{categorie.name}}</td>
              <td>
                  <b-button variant="danger"  @click="delete_subcategorie(subcategorie.id)">
                      <i class="fas fa-trash-alt"></i>
                  </b-button>
                  <b-button variant="success" @click="updatesubcategorie(subcategorie)"  >
                      <i class="fas fa-edit"></i>
                  </b-button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </div> -->
    </div>
     <b-modal  ref="NewSubcategoryModal" hide-footer title="Ajoute dune nouvelle categories">
        <div class="d-block text-center">
          <form v-on:submit.prevent="createSubcategory">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
              <input type="text" v-model="subcategoryData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du categorie">
              <select v-model="subcategoryData.id_categorie">
                <option v-for="(categorie, index) in categories" :key="index" v-bind:value="categorie.id">{{categorie.name}}</option>
              </select>
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideNewSubcategoryModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideNewSubcategoryModal">Save</button>
          </form>
        </div>
    </b-modal>
    <b-modal  ref="EditSubcategoryModal" hide-footer title="Edite subcategorie">
        <div class="d-block text-center">
          <form v-on:submit.prevent="updatsubcategorie">
            <div class="form-group">
              <label for="name">Entrer le nome</label>
              <input type="text" v-model="editsubcategoryData.name" class="form-control" id="name"  name='name' placeholder="Entrer le nome du subcategorie">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideEditSubcategoryModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideEditSubcategoryModal">MAJ</button>
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
      subcategoryData:{
        name: '',
        id_categorie:'',
      },
        editsubcategoryData:{
        name: '',
        id_categorie:'',

      }
    }
  },
     computed:{
        ...mapGetters({
            categories:'subcategories/subcategories',
        }),
      
          },
        created(){
          this.get_categories(),
          this.get_subcategories()
       },
            
  methods: {
    ...mapActions({
      creat_categorie:'categories/creat_categorie',
          creat_subcategorie:'subcategories/creat_subcategorie',
          get_categories:'categories/get_categories',
          get_subcategories:'subcategories/get_subcategories',
          update_subcategorie:'subcategories/update_subcategorie',
          delete_subcategorie:'subcategories/delete_subcategorie',
      }),
     
      
    updatesubcategorie(subcategorie){
      this.showEditSubcategoryModal()
      this.editsubcategoryData = subcategorie;
      return this.editsubcategoryData

    },
  
     updatsubcategorie(){
      //  console.log(this.editcategoryData)
         this.update_subcategorie(this.editsubcategoryData)
      //  console.log( this.editcategoryData.name)
    },
    hideNewSubcategoryModal(){
        this.$refs.NewSubcategoryModal.hide()
    },
     hideEditSubcategoryModal(){
        this.$refs.EditSubcategoryModal.hide()
    },
    showNewSubcategoryModal(){
        this.$refs.NewSubcategoryModal.show()
    },
     showEditSubcategoryModal(){
        this.$refs.EditSubcategoryModal.show()
    },
    createSubcategory() {
        this.creat_subcategorie(this.subcategoryData)
    },
   
 
  }
};
</script>
