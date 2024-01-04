Vue.component('comfortarea', {
  template: `
    <section id="comfort" class="default-center" v-if="filtredList.length > 0">
      <div class="comfort-text">
          <h1 class="section-title">{{textConfortarea}}</h1>
      </div>

      <section class="comfort-area">
          <img
              v-for="image in filtredList"
              class="comfort-image"
              :src="image"
              alt="Imagem da galeria"
          >

          <button class="button primary">Encontre seu estilo</button>

      </section>
    </section>
  `, data() {
    return {
      textConfortarea: textConfortarea,
      filtredList: [],
    }
  },
  props: {
    imagesList: {
      type: Array,
      required: true,
    },
    quantityImages: {
      type: Number,
      required: false,
      default: 4
    }
  },
  mounted() {
    for (let i = 0; i < this.imagesList.length; i++) {
      if (i > (this.quantityImages - 1)) {
        break
      }
      this.filtredList.push(this.imagesList[i]);
    }
  }
})