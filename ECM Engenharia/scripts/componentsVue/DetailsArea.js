Vue.component('detailsarea', {
    template : `
        <section id="details-area" class="default-center" v-if="cardsData.length > 0">
            <div class="text-area">
                <h1 class="section-title center">Nosso diferencial está nos <br> <span>detalhes</span></h1>
            </div>

            <section class="details-area-cards">
                <div class="itens image-area">
                    <img :src="image" alt="imagem decorativa">
                </div>

                <div
                    v-for="card in cardsData"
                    :key="card"
                    class="itens card-detail"
                >
                    <img :src="card.icon" class="details-card-icon" alt="Icone">
                    <h1 class="details-card-title">{{ card.title }}</h1>
                    <p class="details-card-text">{{ card.text }}</p>
                </div>

            </section>
        </section>
    `,
    props : {
        image: {
            type : String,
            required: false,
        },
        cardsData : {
            type : Array,
            required: true,
        }
    }
})