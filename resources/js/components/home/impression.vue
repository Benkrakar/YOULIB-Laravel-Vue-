<template>
  <div class="">
    <section class="services section-bg" id="services">
      <div class="container">
        <header class="section-header">
          <h3>Services</h3>

          <p>
            Cest vous aver besoin dun service parmis les services suivant,
            <span> contacter nous </span>
          </p>
        </header>

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i
                  class="fas fa-id-card service-icon"
                  style="color: #c59c35"
                ></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact>
                  Realisation des carte visites
                </router-link>
              </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i
                  class="fas fa-bullhorn service-icon"
                  style="color: #c59c35"
                ></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact>
                  Realisation des publicite
                </router-link>
              </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i class="fas fa-book service-icon" style="color: #c59c35"></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact>
                  Impression des livres
                </router-link>
              </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i class="fas fa-cube service-icon" style="color: #c59c35"></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact> Impression 3D </router-link>
              </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i
                  class="fas fa-exclamation service-icon"
                  style="color: #c59c35"
                ></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact> Reclamation </router-link>
              </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="box">
              <div class="icon" style="background: #000">
                <i
                  class="fa fa-calendar-alt service-icon"
                  style="color: #c59c35"
                ></i>
              </div>

              <h4 class="title">
                <router-link to="/contact" exact> Rendez vous </router-link>
                <a href=""> </a>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>