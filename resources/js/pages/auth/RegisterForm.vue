<template>
  <div>
    <span></span>
    <section class="login-page d-flex align-content-end flex-wrap" id="content">
      <div class="container h-100 p-3">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h1>Register</h1>
              </div>
              <div class="card-body">
                <form v-on:submit.prevent="submit">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      v-model="form.email"
                      id="email"
                      name="email"
                      required
                      autocomplete="email"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">name</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.name"
                      id="name"
                      name="name"
                      required
                      autocomplete="name"
                    />
                  </div>
                  <div class="form-group">
                    <label for="phone">phone</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="form.phone"
                      id="phone"
                      name="phone"
                      required
                      autocomplete="phone"
                    />
                  </div>
                  <div class="form-group">
                    <label for="ville">ville</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.ville"
                      id="ville"
                      name="ville"
                      required
                      autocomplete="ville"
                    />
                  </div>
                  <div class="form-group">
                    <label for="quartier">quartier</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.quartier"
                      id="quartier"
                      name="quartier"
                      required
                      autocomplete="quartier"
                    />
                  </div>
                  <div class="form-group">
                    <label for="code_postale">code_postale</label>
                    <input
                      type="number"
                      class="form-control"
                      v-model="form.code_postale"
                      id="code_postale"
                      name="code_postale"
                      required
                      autocomplete="code_postale"
                    />
                  </div>
                  <div class="form-group">
                    <label for="image">image</label>
                    <input
                      type="file"
                      class="form-control"
                      v-on:change="setimage"
                      ref="imageUser"
                      id="image"
                      name="image"
                      required
                      autocomplete="image"
                    />
                  </div>
                  <div class="form-group">
                    <label for="Password">Password</label>
                    <div class="input-group">
                      <input
                        v-model="form.password"
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        required
                      />
                      <div
                        class="input-group-append"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Show Password"
                      >
                        <!-- <button class="btn " type="button" id="passwordBtn" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="fas fa-eye"></i></button> -->
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="c_password">c_password</label>
                    <div class="input-group">
                      <input
                        v-model="form.c_password"
                        type="password"
                        class="form-control"
                        id="c_password"
                        name="c_password"
                        required
                      />
                      <div
                        class="input-group-append"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Show Password"
                      >
                        <!-- <button class="btn " type="button" id="passwordBtn" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="fas fa-eye"></i></button> -->
                      </div>
                    </div>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <router-link
                      to="/login"
                      class="btn btn-outline-secondary"
                      tag="button"
                      exact
                    >
                      login
                    </router-link>
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Register"
                    />
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
import { mapActions } from "vuex";

export default {
  data() {
    return {
      form: {
        email: "",
        name: "",
        phone: "",
        ville: "",
        quartier: "",
        code_postale: "",
        password: "",
        c_password: "",
        image: "",
      },
    };
  },
  methods: {
    ...mapActions({
      register: "auth/register",
    }),
    setimage() {
      this.form.image = this.$refs.imageUser.files[0];
    },
    submit() {
      const fd = new FormData();
      fd.append("image", this.form.image);
      fd.append("c_password", this.form.c_password);
      fd.append("password", this.form.password);
      fd.append("code_postale", this.form.code_postale);
      fd.append("quartier", this.form.quartier);
      fd.append("ville", this.form.ville);
      fd.append("phone", this.form.phone);
      fd.append("name", this.form.name);
      fd.append("email", this.form.email);
      console.log(fd);

      this.register(fd);
      this.$router.push("/login");
    },
  },
};
</script>
