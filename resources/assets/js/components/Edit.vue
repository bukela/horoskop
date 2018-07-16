<template>
    <div class="modal" :class='openedit'>
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Edit Horoscope</p>
        <button class="delete" aria-label="close" @click="close();openlist()"></button>
        </header>
        <section class="modal-card-body">
            <div class="field">
                <label class="label">Title</label>
                <input class="input" :class="{'is-danger' :errors.title}" type="text" v-model="item.title" placeholder="Title">
                <small :class="{'has-text-danger' :errors.title}" v-if="errors.title">{{ errors.title[0] }}</small>
            </div>
            <div class="field">
                <label class="label">Content</label>
                <textarea class="textarea" name="short_description" v-model="item.short_description" id="summernote" cols="10" rows="10"></textarea>
                <small :class="{'has-text-danger' :errors.short_description}" v-if="errors.short_description">{{ errors.short_description[0] }}</small>
            </div>
        </section>
        <footer class="modal-card-foot">
        <button class="button is-success" @click="update">Update</button>
        <button class="button is-success is-outlined" @click="close();openlist()">Cancel</button>
        </footer>
        <div class="is-size-2 has-text-success has-text-centered">{{ message }}</div>
    </div>
    </div>
</template>
<script>
export default {
  props: ["openedit","item"],

  methods: {
    close() {
      this.$emit("close-request");
    },

    openlist() {
      this.$emit("open-list-request");
    },
    
    // update() {
    //     axios.get(`/horoscope/edit/${id}`, this.$data.list).then((response) => {
    //         this.message = 'Horoscope updated !';
    //         setTimeout(()=>{
    //             this.message = '';
    //         }, 1500)
    //     })
    //     .catch((error) => this.errors = error.response.data.errors)
    // },
    update(id){
			axios.post(`/horoscope/edit/${id}`,this.$data.item).then((response)=> this.close())
				  .catch((error) => this.errors = error.response.data.errors)
			},
    clear() {
            this.item.title = '',
            this.item.short_description = '',
            this.errors = {}
    }
  },

    
  data() {
      return{
          list: '',
          item: '',
           errors:{

          },
          message: '',
      }
  }
};
</script>