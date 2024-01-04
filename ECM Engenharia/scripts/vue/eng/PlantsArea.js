Vue.component('plantarea', {
    template: `
    <section id="plant-area" class="center-default">
        <div class="area-text" v-if="titleSection || descriptioSection">
            <h1 class="title-base-eng cursive" v-if="titleSection">
                <span>{{ titleSection }}</span>
            </h1>

            <p class="description-base" v-if="descriptioSection" v-html="descriptioSection"></p>
        </div>

        <section class="plant-data">
            <transition name="slide-left" mode="out-in">
                <div class="info" v-if="activePlanta && activePlanta.name" :key="activePlanta.name">
                    <h1 class="planta-title">{{ activePlanta.name }}</h1>

                    <ul class="list-data" v-if="activePlanta.listInfo" :key="activePlanta.name + '-list'">
                        <li v-for="(currentInfo, index) in activePlanta.listInfo" :key="currentInfo.title" class="fade-item"
                            :style="'animation-delay:' + index * .1 + 's'">
                            <img :src="currentInfo.icon" :alt="currentInfo.title"> {{ currentInfo.title }}
                        </li>
                    </ul>
                </div>
            </transition>

            <transition name="fade" mode="out-in">
                <div class="image-area" v-if="activePlanta && activePlanta.imagePlant" :key="activePlanta.name">
                    <img class="image-planta" :src="activePlanta.imagePlant" :alt="activePlanta.name">

                    <div class="button-transition-area" v-if="plantDataList.length > 1">
                        <button class="button-transition" @click="previewPlant">&lt;</button>
                        <button class="button-transition" @click="nextPlant">&gt;</button>
                    </div>
                </div>
            </transition>


        </section>
    </section>
    `,
    data() {
        return {
            idActive: {}
        }
    },
    computed: {
        activePlanta() {
            return this.plantDataList.find(data => {
                return data.id === this.idActive;
            })
        }
    },

    methods: {
        searchPlant() {
            const currentData = this.plantDataList.findIndex(item => {
                return item.id === this.idActive;
            })

            return currentData;
        },

        nextPlant() {
            const currentData = this.searchPlant();
            const nextData = this.plantDataList[currentData + 1];

            const dataUpdate = nextData ? nextData : this.plantDataList[0];

            this.idActive = dataUpdate.id;
        },

        previewPlant() {
            const currentData = this.searchPlant();
            const nextData = this.plantDataList[currentData - 1];

            const dataUpdate = nextData ? nextData : this.plantDataList[this.plantDataList.length - 1];

            this.idActive = dataUpdate.id;
        }
    },

    props: {
        titleSection: {
            type: String,
            required: false
        },

        descriptioSection: {
            type: String,
            required: false
        },

        plantDataList: {
            type: Array,
            required: true,
        }
    },

    mounted() {
        
        console.log('>>>>',this.plantDataList);

        if (this.plantDataList[0]) {
            this.idActive = this.plantDataList[0].id
        }
        console.log(this.idActive);
        console.log(this.activePlanta);
    }
})