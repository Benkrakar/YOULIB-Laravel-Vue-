<template>
  <div >

  <span></span> 
<section class=" login-page d-flex align-content-end flex-wrap" id="content">
  <div class="container h-100 p-3">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h1>Login</h1>
          </div>
          <div class="card-body">
            <form  v-on:submit.prevent="submit">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" v-model="form.email" id="email" name="email" required autocomplete="email">
              </div>
              <div class="form-group">
                <label for="email">Password</label>
                <div class="input-group">
                  <input
                  v-model="form.password"
                  type="password"
                   class="form-control" 
                   id="password" 
                   name="password" required>
                  <div class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
                    <button class="btn " type="button" id="passwordBtn" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="fas fa-eye"></i></button>
                  </div>
                </div>

              </div>
              <div class="form-group d-flex justify-content-between">
                 <router-link
                  to="/register"
                  class="btn btn-outline-secondary"
                  tag="button"
                  exact
                >
                  Register

                  </router-link>
                <input type="submit" class="btn btn-primary" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </div>
</template>
<script>
import { mapActions } from 'vuex'

  export default {
    data() {
      return {
       
        form: {
          email: '',
          password: '',
        
        }
      };
    },
    methods: {
      ...mapActions({
        login:'auth/login'
      }),
        submit() {
         this.login(this.form)
         this.$router.push('/dashboard')
      }
    },
  }

</script>
