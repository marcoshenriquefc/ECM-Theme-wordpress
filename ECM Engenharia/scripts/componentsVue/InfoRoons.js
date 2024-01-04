Vue.component('inforoons', {
    template: `
        <section id="info-rooms" v-if="roonsList.length > 0">
            <div
                v-for="room in roonsList"
                @click="emitItens(room.itens)"
                :key="room.id"
                class="card-data"
            >
                <div class="icon-area">
                    <img :src="room.image" alt="Icone">
                </div>
                <h3 class="title-item">{{ room.title }}</h3>
            </div>
        </section>
    `,
    props: {
        roonsList: {
            type: Array,
            require: true,
        }
    },
    emits: ['toClickItem'],
    methods: {
        emitItens(itens) {
            console.log(itens)
            console.log(itens.length)
            if (itens && itens.length > 0) {
                this.$emit('toClickItem', itens)
            }
        }
    }
})