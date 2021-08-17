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
              <li class="breadcrumb-item active">Messages</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12 mt-5 category-table">
              <div
                class="col-md-12 table-products"
                v-for="(message, index) in messages"
                :key="index"
              >
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">id</th>
                      <th scope="col">client name</th>
                      <th scope="col">client email</th>
                      <th scope="col">client phone</th>
                      <th scope="col">date de reception</th>
                      <th scope="col">controle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row ">1</th>
                      <td class="pt-3">{{ message.id }}</td>
                      <td class="pt-3">{{ message.client_name }}</td>
                      <td class="pt-3">{{ message.client_email }}</td>
                      <td class="pt-3">{{ message.client_phone }}</td>
                      <td class="pt-3">{{ message.created_at }}</td>

                      <td>
                        <b-button variant="danger">
                          <i class="fas fa-trash-alt"></i>
                        </b-button>
                        <b-button variant="success">
                          <i class="fas fa-check-circle"></i>
                        </b-button>
                        <b-button
                          v-b-toggle="'collapse' + index"
                          class="m-1"
                          variant="info"
                        >
                          MSG
                        </b-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="accordion" role="tablist">
                  <b-collapse
                    accordion="my-accordion"
                    role="tabpanel"
                    :id="'collapse' + index"
                  >
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <p>
                            {{ message.contenu_message }}
                          </p>
                        </div>
                      </div>
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
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters({
      messages: "messages/messages",
    }),
  },
  created() {
    this.get_messages();
  },
  methods: {
    ...mapActions({
      get_messages: "messages/get_messages",
      delete_messages: "messages/delete_messages",
    }),
  },
};
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