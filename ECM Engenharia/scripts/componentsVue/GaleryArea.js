Vue.component('galeryarea', {
    template : `
    <section id="comfort" class="default-center" v-if="imagesList.length > 0">
        <div class="comfort-text">
            <h1 class="section-title">Casa é sinônimo de <span class="dark">conforto</span> e <span class="dark">aconchego</span></h1>
        </div>

        <section class="comfort-area">
            <img
                v-for="image in imagesList"
                :key = "image"
                class="comfort-image"
                :src="image"
                alt="Imagem da galeria"
            >
        </section>
    </section>
    `,
    props : {
        imagesList : {
            type : Array,
            required : true,
        },
    },
})