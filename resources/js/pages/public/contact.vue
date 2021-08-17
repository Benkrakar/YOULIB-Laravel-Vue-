<template>
  <div>
    <Sidbar />
    <div id="contact-form" class="contact-form">
      <h1 class="contact-form_title text-center">Contact Form</h1>
      <div class="separator"></div>

      <form class="form d-flex" v-on:submit.prevent="submit">
        <input
          required
          v-model="MessageData.client_name"
          name="name"
          placeholder="Name"
          type="text"
          autocomplete="off"
        />
        <input
          required
          v-model="MessageData.client_email"
          name="email"
          placeholder="E-mail"
          type="email"
          autocomplete="off"
        />
        <input
          required
          v-model="MessageData.client_phone"
          name="phone"
          placeholder="Phone"
          type="number"
          autocomplete="off"
        />
        <textarea
          name="message"
          v-model="MessageData.contenu_message"
          rows="4"
          placeholder="Message"
        ></textarea>
        <div class="d-flex justify-content-center">
          <button class="button">Send</button>
        </div>
      </form>
    </div>

    <Footer />
  </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import Sidbar from "../../components/public/navbar.vue";
import Footer from "../../components/public/footer.vue";
export default {
  data: () => {
    return {
      MessageData: {
        client_name: "",
        client_email: "",
        client_phone: "",
        contenu_message: "",
      },
    };
  },

  components: {
    Sidbar,
    Footer,
  },
  computed: {
    ...mapGetters({
      messages: "messages/messages",
    }),
  },
  created() {},
  methods: {
    ...mapActions({
      creat_messages: "messages/creat_messages",
    }),

    submit() {
      this.creat_messages(this.MessageData);
      this.$swal({
        title: "Message sent ",
        showClass: {
          popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
          popup: "animate__animated animate__fadeOutUp",
        },
      }).then(() => {
        this.$router.push("/home");
      });
    },
  },
};
</script>

<style lang="css">
</style>
