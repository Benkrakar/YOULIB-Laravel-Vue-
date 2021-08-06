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
          <h3>h3. Lorem ipsum dolor sit amet.</h3>
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
              <tr>
                <th scope="row ">1</th>
                <td class="pt-3">Mark</td>
                <td class="pt-3">Otto</td>
                <td>
                    <b-button variant="danger">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                    <b-button variant="success">
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
              <input type="text" v-model="categoryData.name" class="form-control" id="name"  placeholder="Entrer le nome du categorie">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideNewCategoryModal">Save</button>
          </form>
        </div>
    </b-modal>
  </div>
</template>

<script>

export default {
  name :'category',
  data () {
    return {
      categoryData:{
        name: '',

      }
    }
  },
  methods: {
    hideNewCategoryModal(){
        this.$refs.NewCategoryModal.hide()
    },
    showNewCategoryModal(){
        this.$refs.NewCategoryModal.show()
    },
    createCategory: async function() {
      let formData = new FormData();
      formData.append('name', this.categoryData.name);
      try{
        const response = await http_service.createCategory(formData)
        console.log(response)
      }catch (error){
        alert('some err')
      }
    }
  }
};
</script>
