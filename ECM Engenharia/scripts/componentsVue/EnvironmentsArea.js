Vue.component('environmentsarea', {
  template : `
      <section id="environments-area" class="default-center">
          <component
              v-for="enviroments in environmentsFiltred"
              :is="enviroments.link ? 'a' : 'div'"
              :href="enviroments.link"
              :key ="enviroments.title"
              :target="enviroments.blank ? '_blank' : ''"
              class="card-environments"
          >
              <h1  class="title-environments">{{ enviroments.title }}</h1>
              <img class="image-environments" :src="enviroments.image" :alt="'Imagem relacionada ao ambiente' + dataEnvironments.title">
          </component>
      </section> 
  `,
  data() {
      return {
          environmentsFiltred : []
      }
  },
  props : {
      dataEnvironments : {
          type : Array,
          required: true,
      }
  },
  mounted() {
      this.environmentsFiltred = this.dataEnvironments.filter( item => {
          return item.image
      })
  },
})