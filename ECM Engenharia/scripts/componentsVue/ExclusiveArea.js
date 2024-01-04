Vue.component('exclusivearea', {
  template: `
    <section id="exclusive" class="default-center">
      <div class="text-base">
          <h1 class="section-title">{{ textsExclusive.titulo }}</h1>
          <p class="section-subtitle">{{ textsExclusive.subtitulo }}</p>
      </div>

      <section class="info-area">
          <transition name="slide-right" mode="out-in">
              <div class="text-info" :key="activedItem.id" v-if="activedItem">
                  <h1>{{ activedItem.title }}</h1>
                  <p>
                      {{ activedItem.text }}
                  </p>
  
                  <button class="button primary">Aproveite as vantagens</button>
              </div>
          </transition>

          <div class="icon-area">

              <div
                  v-for="item in exclusiveData"
                  class="card-icon"
                  :class="{active : activedIdItem === item.id}"
                  @click="changeExclusive(item.id)"
              >
                  <div class="icon-area">
                      <img :src="item.icon" alt="">
                  </div>
                  <h1>{{ item.title }}</h1>
              </div>
          </div>
      </section>
    </section>
  `,
  data() {
    return {
      textsExclusive: textsExclusiveData,
      activedIdItem: '',
    }
  },
  methods: {
    changeExclusive(idItem) {
      this.activedIdItem = idItem;
    }
  },
  computed: {
    activedItem() {
      const activedItem = this.exclusiveData.find(item => {
        return item.id === this.activedIdItem
      })
      return activedItem;
    }
  },
  props: {
    exclusiveData: {
      type: Array,
      required: true,
    }
  },
  mounted() {
    if (this.exclusiveData.length > 0) {
      this.activedIdItem = this.exclusiveData[0].id;
    }
  }
})