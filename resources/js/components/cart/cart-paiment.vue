<template>
    <div>
        <div
            class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded"  v-for="(car, index) in cart" :key="index"
        >
            <div class="d-flex flex-row">
                <img class="rounded" :src="image" width="40" />
                <div class="ml-2">
                    <span class="font-weight-bold d-block"
                        >{{car.name }}</span
                    >
                    <span class="spec">{{car.name }}</span>
                </div>
            </div >
            <div class="cart_control d-flex flex-row align-items-end ">
                <div class="d-flex ">
                <button @click="decrement()">-</button>
                <input type="number" class="d-block qte" v-model="qte" />
                <button @click="decrement()">+</button>
                </div>
                <span class="d-block ml-5 font-weight-bold mr-3">
                    Totale: {{car.name }}$
                    </span>
                <a href="#"><i class="fas fa-trash  text-black-50"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters,  mapActions } from 'vuex';

export default {
      computed:{
        ...mapGetters({
               cart:'products/cart',
        }),
       

    data: () => {
        return {
            name: '',
            details: '',
            image: '',
            price: '',
            quantite:'',
            totalCart: 0.0
        };
    },

    created() {
        this.total();
        this.ADD_TO_CART()
        console.log(this.ADD_TO_CART())
    },
    methods: {
         ...mapActions({
          GET_CART:'products/GET_CART',
          ADD_TO_CART:'products/ADD_TO_CART',
      }),
        total() {
            this.totalCart = parseFloat(this.qte) * parseFloat(this.price);
        },

        changeCart() {},
        decrement() {
            this.qte--;
            this.totalCart -= this.price;
        }
    }
}
};
</script>

<style lang="css"></style>
