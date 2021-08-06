<template>
    <div>
        <div
            class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded"
        >
            <div class="d-flex flex-row">
                <img class="rounded" :src="image" width="40" />
                <div class="ml-2">
                    <span class="font-weight-bold d-block"
                        >Samsung galaxy Note 10&nbsp;</span
                    >
                    <span class="spec">256GB, Navy Blue</span>
                </div>
            </div >
            <div class="cart_control d-flex flex-row align-items-end ">
                <div class="d-flex ">
                <button @click="decrement()">-</button>
                <input type="number" class="d-block qte" v-model="qte" />
                <button @click="decrement()">+</button>
                </div>
                <span class="d-block ml-5 font-weight-bold mr-3">
                    Totale: {{totalCart}}$
                    </span>
                <a href="#"><i class="fas fa-trash  text-black-50"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: Number,
        qte: Number,
        totalCart: Number,
        parentHandler: Function
    },

    data: () => {
        return {
            image:
                "https://flatsome3.uxthemes.com/wp-content/uploads/woocommerce-placeholder.png",
            title: "subs",
            description: "book of ssss",
            price: 2,
            totalCart: 0.0
        };
    },

    created() {
        this.total();
    },
    methods: {
        total() {
            this.totalCart = parseFloat(this.qte) * parseFloat(this.price);
        },

        changeCart() {},
        decrement() {
            this.qte--;
            this.totalCart -= this.price;
        }
    }
};
</script>

<style lang="css"></style>
