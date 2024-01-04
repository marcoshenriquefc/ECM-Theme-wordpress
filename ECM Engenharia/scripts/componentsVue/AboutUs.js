Vue.component('aboutus', {
  template : `
    <section id="about" class="default-center">
      <div class="about-content">
          <div class="about-image" v-if="image">
              <img :src="image" alt="">
          </div>
          <div class="about-description">
              <h1 class="section-title">Quem <br><span>Somos</span></h1>
              
              <div class="about-text" v-if="text">
                  <p>
                      <!-- Carregar texto aqui  -->
                      {{ text }}
                  </p>
              </div>
          </div>
      </div>
    </section>
  `,
  props: {
    title : {
        type : String,
        required: true,
    },
    text : {
      type: String,
      required: true
    },
    image : {
        type : String,
        required: true,
    }
  }
})