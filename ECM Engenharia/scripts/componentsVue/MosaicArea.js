Vue.component('mosaicarea', {
    template: `
        <section class="default-center" v-if="imageList.length > 0">
            <div class="text-area">
                <h1 class="section-title">{{ title }}</h1>
            </div>

            <section
                v-if="imageList.length > 0"
                id="mosaic-area"
                class="type-base"
                :class="mosaicType"
            >
                
                <a
                    v-for="(image, index ) in imageList"
                    class="mosaic-item mosaic-1"
                    :href="image.link"
                    target="_blank"
                >
                    <img :src="image.image" alt="Imagem do mosaico">
            </a>
            </section>
        </section>
    `,
    props: {
        title: {
            type: String,
            required: false,
        },
        imageList: {
            type: Array,
            required: true,
        },
        mosaicType: {
            type: String,
            required: false,
            default: 'base',
            validator(value) {
                const validValue = ['base', 'secundary'];

                return validValue.includes(value)
            }
        }

        // [
        //     {
        //         image   : '',
        //         link    : '',
        //     }
        // ]
    }
})