Vue.component('textdecorationarea', {
  template : `
  <section id="text-decoration" class="default-center">
    <div class="text-area">
        <h1 class="top-text">{{ firstText }}<span v-if="secondText">&</span></h1>
        <h1 class="bottom-text" v-if="secondText">{{ secondText }}</h1>
    </div>
  </section>
  `,
  props : {
    firstText : {
        type : String,
        required: true,
    },
    secondText : {
        type : String,
        required: false,
    }
  }
})