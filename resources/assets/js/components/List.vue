<template>
    <div class="modal" :class='openlist'>
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
        <p class="modal-card-title">All Horoscopes </p>
        <button class="delete" aria-label="close" @click="close"></button>
        </header>
        <div class="searchblock panel-block">
        <p class="searchlist control has-icons-left is-pulled-right">
	        <input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
	        <span class="icon is-small is-left">
	        <i class="fa fa-search"></i>
	      </span>
	    </p>
        </div>
        <section class="modal-card-body">
            <div class="field" v-for="(item, key) in temp" :key="item.id">
                <span class="long-text">{{ item.title }} </span>
                <span class="long-text">Created at: {{ item.created_at }} </span>
                <span class="long-text">Horoscope: {{ item.horoscopegroup.name }}</span>
                <span class="long-text">Sign: {{ item.sign.name }}</span>
                <!-- {{ item.types[0] }} -->
                <!-- <button class="listbutton button is-success is-outlined is-pulled-right" @click="close();openedit(key)">Edit</button> -->
                <button class="listbutton button is-danger is-outlined is-pulled-right" @click="del(key, item.id)">Delete</button>
                <hr>
            </div>
        </section>
        <footer class="modal-card-foot">
        </footer>
        <div class="is-size-2 has-text-danger has-text-centered">{{ message }}</div>
    </div>
    </div>
</template>
<script>
export default {
  props: ["openlist"],
  mounted() {
    this.getall();
  },
  watch:{
	searchQuery(){
		if (this.searchQuery.length > 0) {
			this.temp = this.lists.filter((item) => {
				return Object.keys(item).some((key)=>{
					// let string = String(item[key])  za search kroz ceo object i dole item.string
					return item.title.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
				})
			});
		}else{
			this.temp = this.lists
		}
	}
    },
  methods: {
    close() {
      this.$emit("close-request");
      this.searchQuery = []
    },

    openedit(key) {
       var item = this.temp[key];
      this.$emit("open-edit-request", item);
    },
    
    getall() {
        axios.post('/gethoro')
        .then((response) => {
            this.lists = this.temp = response.data;
            })
        .catch((error) => this.errors = error.response.data.errors)

    },
    del(key,id) {
        if (confirm("Delete horoscope ?")) {
        axios.get(`/horoscope/delete/${id}`)
        .then((response) => {
            this.lists.splice(key,1)
            this.temp.splice(key,1)
            this.message = 'Horoscope deleted !';
            setTimeout(()=>{
                this.message = '';
                }, 1500)
            }
        )
        .catch((error) => this.errors = error.response.data.errors)
        }
        // console.log(`${key} ${id}`)
    },

  },

    
  data() {
      return{
          lists: [],
          message: '',
          searchQuery: '',
          temp: ''
      }
  }
};
</script>