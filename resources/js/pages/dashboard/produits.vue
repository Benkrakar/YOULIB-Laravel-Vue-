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
              <li class="breadcrumb-item active">Produits</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2 d-flex">
            <button
              type="button"
              class="btn btn-category"
              v-on:click="showNewProductModal"
            >
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
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(product, index) in products.data" :key="index">
                    <th scope="row ">{{ product.id }}</th>
                    <td class="pt-3">{{ product.name }}</td>

                    <td>
                      <b-button
                        variant="danger"
                        @click="delete_product(product)"
                      >
                        <i class="fas fa-trash-alt"></i>
                      </b-button>
                      <b-button
                        variant="success"
                        @click="updatProducts(product)"
                      >
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
    <b-modal
      id="modal-xl"
      size="xl"
      ref="NewProductModal"
      hide-footer
      title="Ajoute d'un produit"
    >
      <div class="modalDashboard text-center">
        <form v-on:submit.prevent="createProduct">
          <div class="form-group">
            <input
              type="text"
              v-model="productsData.name"
              class="form-control"
              id="name"
              name="name"
              placeholder="Entrer le nome du produite"
            />
            <textarea
              type="text"
              v-model="productsData.details"
              class="form-control"
              id="details"
              name="details"
              placeholder="details"
            ></textarea>
            <input
              type="number"
              v-model="productsData.price"
              class="form-control"
              id="price"
              name="price"
              placeholder="price"
            />
            <label for="image" size="lg">choisie une image</label>
            <input
              type="file"
              size="lg"
              class="form-control"
              v-on:change="setimage"
              ref="imageProduct"
              id="image"
              name="image"
              required
              autocomplete="image"
            />

            <input
              type="number"
              v-model="productsData.quantite"
              class="form-control"
              id="quantite"
              name="quantite"
              placeholder="Q"
            />
            <!-- <input type="number" v-model="productsData.id_subcategorie" class="form-control" id="id_subcategorie"  name='id_subcategorie' placeholder="id_subcategorie"> -->

            <b-form-select v-model="productsData.id_subcategorie" class="mb-3">
              <b-form-select-option selected :value="null" disabled
                >-- Please select an option --</b-form-select-option
              >
              <b-form-select-option
                v-for="(subcategorie, index) in subcategories"
                :key="index"
                v-bind:value="subcategorie.id"
                >{{ subcategorie.name }}</b-form-select-option
              >
            </b-form-select>
          </div>
          <hr />
          <button
            type="button"
            class="btn btn-default"
            v-on:click="hideNewProductModal"
          >
            Exit
          </button>
          <button
            type="submit"
            class="btn btn-primary"
            v-on:click="hideNewProductModal"
          >
            Save
          </button>
        </form>
      </div>
    </b-modal>
    <b-modal
      id="modal-xl"
      size="xl"
      ref="EditProductModal"
      hide-footer
      title="Edite product"
    >
      <div class="modalDashboard text-center">
        <form v-on:submit.prevent="oop">
          <div class="form-group">
            <input
              type="text"
              v-model="editproductsData.name"
              class="form-control"
              id="name"
              name="name"
              placeholder="Entrer le nome du produite"
            />
            <input
              type="text"
              v-model="editproductsData.details"
              class="form-control"
              id="details"
              name="details"
              placeholder="Entrer le nome du produite"
            />
            <input
              type="text"
              v-model="editproductsData.price"
              class="form-control"
              id="price"
              name="price"
              placeholder="price"
            />
            <b-form-file id="file-image" size="lg">
              <input
                type="file"
                class="form-control"
                v-on:change="setimageedit"
                ref="imageProduct"
                id="image"
                name="image"
                required
              />
            </b-form-file>
            <input
              type="text"
              v-model="editproductsData.quantite"
              class="form-control"
              id="quantite"
              name="quantite"
              placeholder="Q"
            />

            <b-form-select
              v-model="editproductsData.id_subcategorie"
              class="mb-3"
            >
              <b-form-select-option selected :value="null" disabled
                >-- Please select an option --</b-form-select-option
              >
              <b-form-select-option
                v-for="(subcategorie, index) in subcategories"
                :key="index"
                v-bind:value="subcategorie.id"
                >{{ subcategorie.name }}</b-form-select-option
              >
            </b-form-select>
          </div>
          <hr />
          <button
            type="button"
            class="btn btn-default"
            v-on:click="hideEditProductModal"
          >
            Exit
          </button>
          <button
            type="submit"
            class="btn btn-primary"
            v-on:click="hideEditProductModal"
          >
            MAJ
          </button>
        </form>
      </div>
    </b-modal>
    <div class="paginations d-flex justify-content-center">
      <pagination
        class="pagination"
        :data="products"
        @pagination-change-page="getResults"
      >
        <span slot="prev-nav">&lt; Previous</span>
        <span slot="next-nav">Next &gt;</span>
      </pagination>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "products",

  data() {
    return {
      productsData: {
        name: "",
        details: "",
        image: "",
        price: "",
        quantite: "",
        id_subcategorie: "",
      },
      editproductsData: {
        id: "",
        name: "",
        details: "",
        image: "",
        price: "",
        quantite: "",
        id_subcategorie: "",
      },
    };
  },
  mounted() {
    this.getResults();
  },
  computed: {
    ...mapGetters({
      products: "products/products",
      subcategories: "subcategories/subcategorie",
    }),
  },
  created() {
    this.get_product_paginated_dash(), this.get_subcategorie();
  },
  methods: {
    ...mapActions({
      creat_products: "products/creat_products",
      get_product_paginated_dash: "products/get_product_paginated_dash",
      update_products: "products/update_products",
      delete_products: "products/delete_products",
      get_subcategorie: "subcategories/get_subcategorie",
    }),
    setimage() {
      this.productsData.image = this.$refs.imageProduct.files[0];
    },
    setimageedit() {
      this.editproductsData.image = this.$refs.imageProduct.files[0];
    },
    updatProducts(product) {
      this.showEditProductModal();
      this.editproductsData = product;
      return this.editproductsData;
    },
    oop() {
      const fd = new FormData();

      fd.id = this.editproductsData.id;
      fd.append("id", this.editproductsData.id);
      fd.append("image", this.editproductsData.image);
      fd.append("name", this.editproductsData.name);
      fd.append("price", this.editproductsData.price);
      fd.append("details", this.editproductsData.details);
      fd.append("quantite", this.editproductsData.quantite);
      fd.append("id_subcategorie", this.editproductsData.id_subcategorie);
      fd.append("_method", "put");
      console.log(this.editproductsData.id);
      this.update_products(fd);
    },
    hideNewProductModal() {
      this.$refs.NewProductModal.hide();
    },
    hideEditProductModal() {
      this.$refs.EditProductModal.hide();
    },
    showNewProductModal() {
      this.$refs.NewProductModal.show();
    },
    showEditProductModal() {
      this.$refs.EditProductModal.show();
    },
    createProduct() {
      const df = new FormData();
      df.append("image", this.productsData.image);
      df.append("name", this.productsData.name);
      df.append("price", this.productsData.price);
      df.append("details", this.productsData.details);
      df.append("quantite", this.productsData.quantite);
      df.append("id_subcategorie", this.productsData.id_subcategorie);
      console.log(df);
      this.creat_products(df);
    },
    getResults(page = 1) {
      this.get_product_paginated_dash(page);
    },
    delete_product(product) {
      this.$swal({
        title: "Are you sure?",
        text: "You won't to delte this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.delete_products(product.id);
          this.$swal("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
};
</script>

<style scoped>
</style>