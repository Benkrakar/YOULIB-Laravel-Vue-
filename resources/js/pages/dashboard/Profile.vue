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
                    <th scope="col">utilisateur</th>
                    <th scope="col">name</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">adresse</th>
                    <th scope="col">supprime</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row ">1</th>
                    <td class="pt-3">Mark</td>
                    <td class="pt-3">Otto</td>
                    <td class="pt-3">22</td>
                    <td class="pt-3">22</td>
                    <td class="pt-3">22</td>
                    <td>
                      <b-button variant="danger">
                        <i class="fas fa-trash-alt"></i>
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
  </div>
</template>

<script>
export default {};
</script>

<style scoped>

</style>