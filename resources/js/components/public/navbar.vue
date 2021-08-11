<template>
  <div>
    <section class="nav-home ">
        <div class="utility-nav d-none d-md-block">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-12 col-md-6">
                <p class="small"><i class="far fa-envelope"></i> logo@example.com | <i class=" pl-1 fas fa-phone-alt"></i> +91-9876543210
                </p>
              </div>
              <div class="nav-social pr-5">
                <ul class="d-flex m-0">
                  <li><a href="#">
                    <i class="fab fa-whatsapp mr-3"></i>
                  </a></li>
                  <li><a href="#">
                    <i class="fab fa-facebook-square mr-3"></i>
                  </a></li>
                  <li><a href="#">
                    <i class="fab fa-instagram"></i>
                  </a></li>
              </ul>
              </div>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
          <div class="container">
            <button type="button"  v-b-toggle.sidebar-right class="btn btn-link d-block d-md-none">
              <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand pt-3" href="#">
              <h4 class="font-weight-bold">YOULIB</h4>
            </a>
        
            <ul class="navbar-nav ml-auto d-block d-md-none">
              <li class="nav-item">
                <a class="btn btn-link" href="#"><i class="fas fa-shopping-cart "></i> <span class="badge badge-danger">3</span></a>
              </li>
            </ul>
        
            <div class="collapse navbar-collapse">
              <form class="form-inline my-2 my-lg-0 mx-auto">
                <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
                <button class="btn-login btn my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
        
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="btn btn-link" href="#"><i class="fas fa-shopping-cart"></i><span class="badge badge-danger">3</span></a>
                  <a class="btn btn-link" href="#"><i class="fas fa-heart"></i><span class="badge badge-danger">3</span></a>
    
                </li>
                 <router-link
                  to="/dashboard"
                  active-class="active d-flex justify-content-around"
                  tag="button"
                  exact
                >
        <div>
          <i class="fas fa-tachometer-alt "></i>
        </div>
      </router-link>
              </ul>
            </div>
        
          </div>
        </nav>
        
        <nav class="navbar-title navbar-expand-md navbar-light bg-light sub-menu">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="navbar-nav  mx-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Schools</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Publishers</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Support
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Delivery Information</a>
                    <a class="dropdown-item" href="#">Privacy Policy</a>
                    <a class="dropdown-item" href="#">Terms & Conditions</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        
        <div class="search-bar d-block d-md-none">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <form class="form-inline mb-3 mx-auto">
                  <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
                  <button class="btn btn-login" type="submit"><i class="fas fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
  
    <b-sidebar id="sidebar-right"  >
      <div class="px-3 py-2">
        <nav id="sidebar-right">
          <div class="">
            <div class="container">
              <div class="row  justify-content-around">
                <div class="d-flex col-10 pl-0">
                  <a class="btn btn-login" href="#"><i class="fas fa-user"></i> Log In</a>
                </div>
                <div class="col-2 text-left">
                  <button type="button"  v-b-toggle.sidebar-right class="btn btn-link">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        
          <ul class="list-unstyled components links">
            <li class="nav-link">
              <a   href="#"><i class="bx bx-home mr-3"></i> Home</a>
            </li>
            <li class="nav-link">
              <a  href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
            </li >
            <li class="nav-link">
              <a  href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
            </li>
            <li class="nav-link">
              <a  href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
            </li>
            <li class="nav-link">
              <a  href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">  
                            Support</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                  <a href="#">Delivery Information</a>
                </li>
                <li>
                  <a href="#">Privacy Policy</a>
                </li>
                <li>
                  <a href="#">Terms & Conditions</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
            </li>
          </ul>
        
        </nav>
      </div>
    </b-sidebar>
    </section>
  </div>
</template>