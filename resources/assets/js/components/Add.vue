<template>
    <div class="modal" :class='openmodal'>
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">New Horoscope</p>
        <button class="delete" aria-label="close" @click="close"></button>
        </header>
        <section class="modal-card-body">
            <div class="modal-buttons">
              <button class="button is-primary button-horo" @click="close();openregular()">Regular</button>
              <button class="button is-danger button-horo" @click="close();openchinese()">Chinese</button>
              <button class="button is-success button-horo" @click="close();openmayan()">Mayan</button>
            </div>
        </section>
        <footer class="modal-card-foot">
        <button class="button" @click="close">Cancel</button>
        </footer>
    </div>
    </div>
</template>
<script>
export default {
  props: ["openmodal"],
  // mounted() {
  //   this.getall();
  // },
  methods: {
    close() {
      this.$emit("close-request");
    },

    openregular() {
      this.$emit("open-regular-request");
    },

    openchinese() {
      this.$emit("open-chinese-request");
    },
    openmayan() {
      this.$emit("open-mayan-request");
    },
    // getall() {
    //     axios.post('/gethoro')
    //     .then((response) => this.lists = response.data)
    //     .catch((error) => this.errors = error.response.data.errors)
    // }
  },
  data() {
    return {
      // lists: [],
      errors: {},
    }
  }
};
</script>