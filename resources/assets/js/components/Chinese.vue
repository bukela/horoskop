<template>
    <div class="modal" :class='openchinese'>
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">Chinese Horoscope</p>
        <button class="delete" aria-label="close" @click="close();clear()"></button>
        </header>
        <section class="modal-card-body">

            <div class="field">
            <label class="label">Horoscope sign</label>
            <div class="select">
                <select name="sign_id" v-model="list.sign_id">
                    <option value="13">Pacov</option>
                    <option value="14">Bivo</option>
                    <option value="15">Tigar</option>
                    <option value="16">Zec</option>
                    <option value="17">Zmaj</option>
                    <option value="18">Zmija</option>
                    <option value="19">Konj</option>
                    <option value="20">Koza</option>
                    <option value="21">Majmun</option>
                    <option value="22">Petao</option>
                    <option value="23">Pas</option>
                    <option value="24">Svinja</option>
                </select>
                <small :class="{'has-text-danger' :errors.sign_id}" v-if="errors.sign_id">{{ errors.sign_id[0] }}</small>
            </div>
            </div>
           <div class="field">
            <label class="label">Horoscope schedule</label>
            <div class="select">
                <select name="schedules" v-model="list.schedules">
                    <option value="1">Dnevni</option>
                    <option value="2">Nedeljni</option>
                    <option value="3">Mesecni</option>
                    <option value="4">Godisnji</option>
                </select>
                <small :class="{'has-text-danger' :errors.schedules}" v-if="errors.schedules">{{ errors.schedules[0] }}</small>
            </div>
            </div>

            <div class="field">
            <label class="label">Horoscope type</label>
            <div class="select">
                <select name="types" v-model="list.types">
                    <option value="1">Klasik</option>
                    <option value="2">Ljubavni</option>
                    <option value="3">Poslovni</option>
                </select>
                <small :class="{'has-text-danger' :errors.types}" v-if="errors.types">{{ errors.types[0] }}</small>
            </div>
            </div>
            <div class="field">
                <label class="label">Title</label>
                <input class="input" :class="{'is-danger' :errors.title}" type="text" v-model="list.title" placeholder="Title">
                <small :class="{'has-text-danger' :errors.title}" v-if="errors.title">{{ errors.title[0] }}</small>
            </div>
            <div class="field">
                <label class="label">Content</label>
                <textarea class="textarea" :class="{'is-danger' :errors.short_description}" name="short_description" v-model="list.short_description" id="summernote1" cols="10" rows="10"></textarea>
                <small :class="{'has-text-danger' :errors.short_description}" v-if="errors.short_description">{{ errors.short_description[0] }}</small>
            </div>
        </section>
        <footer class="modal-card-foot">
        <button class="button is-success" @click="save">Save changes</button>
        <button class="button is-success is-outlined" @click="close();clear()">Cancel</button>
        <button class="button is-success is-outlined" @click="close();openAdd()">Back to select</button>
        <button class="button is-danger is-outlined" @click="clear">Clear</button>
        </footer>
        <div class="is-size-2 has-text-success has-text-centered">{{ message }}</div>
    </div>
    </div>
</template>
<script>
export default {
  props: ["openchinese"],
  methods: {
    close() {
      this.$emit("close-request");
    },
    openAdd() {
      this.$emit("open-add-request");
    },

    save() {
        axios.post('/horoscope/store', this.$data.list).then((response) => {
            this.message = 'Horoscope saved !';
            this.errors = {};
            setTimeout(()=>{
                this.message = '';
            }, 1500)
        })
        .catch((error) => this.errors = error.response.data.errors)
    },
    clear() {
            this.list.schedules = '',
            this.list.types = '',
            this.list.sign_id = '',
            this.list.title = '',
            this.list.short_description = '',
            this.errors = {}
    }
  },

    
  data() {
      return{
          list:{
              horoscopegroup_id: '2',
              schedules: '',
              types: '',
              sign_id: '',
              title: '',
              short_description: ''
          },
           errors:{

          },
          message: '',
      }
  }
};
</script>