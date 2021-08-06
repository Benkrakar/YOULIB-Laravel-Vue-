<template>
    <div >
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
               <div class="row">
        <div class="col-md-12 mt-5 category-table">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">quantite</th>
                <th scope="col">categorie</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row ">1</th>
                <td class="pt-3">Mark</td>
                <td class="pt-3">Otto</td>
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
	</div>
</div>
    </div>
</template>

<script>
    export default {
        
    }
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