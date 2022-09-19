import axios from 'axios'
import { defineStore } from 'pinia'
// import { ref } from 'vue'

// You can name the return value of `defineStore()` anything you want, but it's best to use the name of the store and surround it with `use` and `Store` (e.g. `useUserStore`, `useCartStore`, `useProductStore`)
// the first argument is a unique id of the store across your application
export const useArticleStore = defineStore('article', { 

  state: () => {
    return {
      list: []
    }
  },

  getters: {
    // adiCount: 20
  },

  actions: {  
   async getList() {
    await axios.get('/api/article')
      .then((res) => {
        this.list = res.data
      })
    }
}

})

