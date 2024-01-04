Vue.component('carrosselhero', {
  template: `
    <section id="carrossel-hero" :style="maxWidth ? {maxWidth : '1200px'} :''">
        <div class="banner-area" v-if="currentCarrossel">

            <a :href="currentCarrossel.link" class="button primary" v-if="currentCarrossel.button">{{ currentCarrossel.button }}</a>

            <div class="banner-dots-area" v-if="itensCarrossel.length > 1">
                <span
                    v-for="bannerDot in itensCarrossel"
                    class="banner-dot"
                    :class="bannerDot.id === bannerIdActive ? 'active' : ''"
                    :key="bannerDot.id"
                    @click="changeBannerTo(bannerDot.id)"
                ></span>
            </div>

            <button v-if="itensCarrossel.length > 1" class="banner-arrow next-arrow" @click="changeBannerBack()"> &lt; </button>
            <button v-if="itensCarrossel.length > 1" class="banner-arrow back-arrow" @click="changeBannerNext()"> &gt; </button>

            <transition name="slide-left" mode="out-in">
                <a :href="currentCarrossel.link" class="banner-link" :key="currentCarrossel.id">
                    <img
                        class="banner-image desktop"
                        :src="currentCarrossel.image?.desktop"
                        alt="Banner principal"
                    >
                    <img
                        class="banner-image mobile"
                        :src="currentCarrossel.image?.mobile ? currentCarrossel.image?.mobile : currentCarrossel.image?.desktop"
                        alt="Banner principal"
                    >
                </a>
            </transition>
        </div>
    </section>
  `,
  data() {
    return {
      bannerIdActive: '',
      timer: null,
      timerSeconds: 5,
    }
  },
  computed: {
    currentCarrossel() {
      return this.itensCarrossel.find(banner => {
        return banner.id === this.bannerIdActive;
      })
    },
    quantityBanners() {
      return this.itensCarrossel.length;
    }
  },
  methods: {
    changeBanner() {
      const currentBanner = this.itensCarrossel.findIndex(banner => {
        return this.bannerIdActive === banner.id;
      })

      const item = this.itensCarrossel[currentBanner + 1]
      if (!item || (currentBanner + 1 <= 0)) {
        this.changeBannerTo(this.itensCarrossel[0].id)
        return
      }

      this.changeBannerTo(item?.id || -1);
    },

    changeBannerTo(idBanner) {
      const findIndexById = this.itensCarrossel.findIndex(banner => {
        return idBanner === banner.id
      })
      this.resetTimer();

      if (findIndexById < 0) {
        this.bannerIdActive = this.itensCarrossel[0].id;
        return
      }
      this.bannerIdActive = idBanner;

    },

    changeBannerBack() {
      const item = this.itensCarrossel.findIndex(banner => {
        return banner.id === this.bannerIdActive;
      })

      const backItemId = this.itensCarrossel[item - 1];
      if (!backItemId) {
        this.changeBannerTo(this.itensCarrossel[this.quantityBanners - 1].id)
        return
      }
      this.changeBannerTo(backItemId.id)
    },

    changeBannerNext() {
      const item = this.itensCarrossel.findIndex(banner => {
        return banner.id === this.bannerIdActive;
      })

      const nextItemId = this.itensCarrossel[item + 1];
      if (!nextItemId) {
        this.changeBannerTo(this.itensCarrossel[0].id)
        return
      }
      this.changeBannerTo(nextItemId.id)
    },

    resetTimer() {
      if (this.timer) {
        clearInterval(this.timer);
        this.timer = setInterval(() => this.changeBanner(), (this.timerSeconds * 1000));
      }
    }
  },
  props: {
    itensCarrossel: {
      type: Array,
      required: true,
    },
    // [
    //     {
    //         id      : '1',
    //         image   : 'https://',
    //         link    : '#',
    //         button  : 'Encontre seu estilo'
    //     }
    // ]
    maxWidth : {
      type: Boolean,
      required: false,
    }
  },
  mounted() {
    console.log('>>>>>>>>',this.itensCarrossel)
    if (this.itensCarrossel.length > 0) {
      const firstCarrosselId = this.itensCarrossel[0]?.id;
      this.changeBannerTo(firstCarrosselId);

      this.timer = setInterval(() => this.changeBanner(), (this.timerSeconds * 1000));

    }
    else {
      console.error('itensCarrossel está vazio ou não é um array válido.');
    }
  },
  beforeUnmount() {
    clearInterval(this.timer)
  },
  beforeDestroy() {
    clearInterval(this.timer)
  },
})