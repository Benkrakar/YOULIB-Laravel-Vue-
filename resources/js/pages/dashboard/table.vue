<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 mt-3">
          <div class="row">
            <div class="pl-5 col-md-4">
              <h3>Dashboard</h3>
            </div>
              <div class="pl-5 col-md-4">
              <h3>Dashboard</h3>
            </div>
        
          </div>
          <div class="row mt-5">
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-boxes fa-2x"></i>
                  <b-card-text class="mt-2">Produits</b-card-text>
                  <h2>22</h2>
                </div>
              </b-card>
            </div>
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-shopping-bag fa-2x"></i>
                  <b-card-text class="mt-2">Commandes</b-card-text>
                  <h2>22</h2>
                </div>
              </b-card>
            </div>
            <div class="col-md-4">
              <b-card bg-variant="secondary" text-variant="white">
                <div class="d-flex justify-content-around">
                  <i class="fas fa-users fa-2x"></i>
                  <b-card-text class="mt-2">utilisateurs</b-card-text>
                  <h2>22</h2>
                </div>
              </b-card>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12 mt-5 category-table">
                <h3>les dernières commandes</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">produit</th>
                      <th scope="col">client</th>
                      <th scope="col">quantite</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row ">1</th>
                      <td class="pt-3">Mark</td>
                      <td class="pt-3">Otto</td>
                      <td class="pt-3">22</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h3>Derniers inscrits</h3>
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