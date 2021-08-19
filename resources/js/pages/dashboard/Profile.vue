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
              <li class="breadcrumb-item active">Utilisateurs</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12 mt-5 category-table">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">name</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">ville</th>
                    <th scope="col">quartier</th>
                    <th scope="col">created_at</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(profile, index) in profiles" :key="index">
                    <th scope="row ">{{profile.id }}</th>
                    <td class=" user_img"> <img :src="`${$store.state.serverpath}/storage/${profile.image}`" alt=""></td>
                    <td class="pt-3">{{profile.name }}</td>
                    <td class="pt-3">{{profile.phone }}</td>
                    <td class="pt-3">{{profile.email }}</td>
                    <td class="pt-3">{{profile.role }}</td>
                    <td class="pt-3">{{profile.ville }}</td>
                    <td class="pt-3">{{profile.quartier }}</td>
                    <td class="pt-3">{{profile.created_at }}</td>
                    <td>
                     <b-button variant="danger"  @click="delete_profiles(profile.id)">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                    <b-button variant="success" @click="updatprofiles(profile)"  >
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
    <b-modal  ref="EditProfileModal" hide-footer title="Edite profile">
        <div class="d-block text-center">
          <form v-on:submit.prevent="oop">
            <div class="form-group">
              <input type="text" v-model="editprofilesData.name" class="form-control" id="name"  name='name' placeholder="name">
              <input type="number" v-model="editprofilesData.phone" class="form-control" id="phone"  name='phone' placeholder="phone">
              <input type="email" v-model="editprofilesData.email" class="form-control" id="email"  name='email' placeholder="email">
              <input type="number" v-model="editprofilesData.code_postale" class="form-control" id="code_postale"  name='code_postale' placeholder="code_postale">
              <input type="file" class="form-control" v-on:change="setimageedit" ref="editimageProfile" id="image" name="image"  autocomplete="image"> 
             <select v-model="editprofilesData.role" id="role"  name='role'>
              <option disabled value="">role</option>
              <option>client</option>
              <option>admin</option>
            </select>
              <input type="text" v-model="editprofilesData.ville" class="form-control" id="ville"  name='ville' placeholder="ville">
              <input type="text" v-model="editprofilesData.quartier" class="form-control" id="quartier"  name='quartier' placeholder="quartier">
            </div>
            <hr>
              <button type="button" class="btn btn-default" v-on:click="hideEditProfileModal">Exit</button>
              <button type="submit" class="btn btn-primary" v-on:click="hideEditProfileModal">MAJ</button>
          </form>
        </div>
    </b-modal>
  </div>
</template>
<script>
import {mapGetters,  mapActions } from 'vuex';
import axios from 'axios'
export default {
  name :'profiles',
  data () {
    return {
        editprofilesData:{
        name: '',
        image: '',
        phone: '',
        email: '',
        role:'',
        ville:'',
        quartier:'',
        code_postale:''
      }
    }
  },
     computed:{
        ...mapGetters({
            profiles:'profiles/profiles',
        }),
        computed(){
          profiles:this.$store.getters['profiles/get_profiles']
        }
     },
     created(){
       this.get_profiles()
     },
  methods: {
      ...mapActions({
          get_profiles:'profiles/get_profiles',
          update_profiles:'profiles/update_profiles',
          delete_profiles:'profiles/delete_profiles'
      }),
       setimageedit(){
       this.editprofilesData.image = this.$refs.editimageProfile.files[0]
      },
      updatprofiles(profile){
      this.showEditProfileModal()
     this.editprofilesData = profile
    return this.editprofilesData;
    },
       oop(){
        const fd = new FormData()
        fd.id = this.editprofilesData.id
        fd.append('image',this.editprofilesData.image)
        fd.append('name',this.editprofilesData.name)
        fd.append('phone',this.editprofilesData.phone)
        fd.append('email',this.editprofilesData.email)
        fd.append('code_postale',this.editprofilesData.code_postale)
        fd.append('role',this.editprofilesData.role)
        fd.append('ville',this.editprofilesData.ville)
        fd.append('quartier',this.editprofilesData.quartier)
        fd.append('_method','put')
       this.update_profiles(fd)
      },
     hideEditProfileModal(){
        this.$refs.EditProfileModal.hide()
    },
     showEditProfileModal(){
        this.$refs.EditProfileModal.show()
    },
  }
};
</script>
<style scoped>
</style>