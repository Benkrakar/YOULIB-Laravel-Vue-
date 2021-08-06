<template>
    <div>
         <section class="hero-area text-center overly ">
        <div class="over"></div>
        <!-- Container Start -->
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <!-- Header Contetnt -->
            <div class="content-block ">
                <h1><vue-typer text=" Qualité au meilleur prix pour 
    la rentrée des classes"></vue-typer></h1>
            </div>
            <div class="advance-search">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 align-content-center">
                        <div class="container">
                        <div class="row ">
                            <div class="container cartes-header col-md-4 ">
                            <div class="content-header">
                                <div class="overly-cartes"></div>
                                <h3 class="title-carte-header ">Livres scolaires</h3>  
                                <img
                                    class="carte-header-image"  
                                    :src="require('../../../images/ecole.jpg').default" 
                                >
                                <div class="carte-header-details fadeIn-bottom">
                                    <div class="desc row justify-content-center">
                                    <button class="">Consulter</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="container cartes-header col-md-4 ">
                            <div class="content-header">
                                <div class="overly-cartes"></div>
                                <h3 class="title-carte-header justify-content-center d-flex">Cahiers scolaires</h3>  
                                <img class="carte-header-image" 
                                :src="require('../../../images/cahier.jpg').default" >
                                <div class="carte-header-details fadeIn-bottom">
                                    <div class="desc row justify-content-center">
                                    <button class="">Consulter</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="container cartes-header col-md-4 ">
                            <div class="content-header">
                                <div class="overly-cartes"></div>
                                <h3 class="title-carte-header  ">affaires scolaires</h3>  
                                <img class="carte-header-image" 
                                    :src="require('../../../images/téléchargement.jpg').default" >
                                <div class="carte-header-details fadeIn-bottom">
                                    <div class="desc row justify-content-center">
                                    <button class="">Consulter</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div>
</template>