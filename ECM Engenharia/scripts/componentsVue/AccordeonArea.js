Vue.component('accordeonarea', {
    template : `
        <section class="accordeon-area">
            <div
                v-for="questions in questionList"
                class="accordeon-decor"
                :class="questions.id === activeAccordeon.id ? 'active' : ''"
                :ref="'accordeon' + questions.id"
            >
                <header class="question-title" @click="toggleAccordion(questions.id)">
                    <h1 class="title-accordeon">{{ questions.title }}</h1>
                </header>
                <main class="question-text">
                    <p class="text-accordeon">{{ questions.text }}</p>
                </main>
            </div>
        </section>
    `,
    data() {
        return {
            activeAccordeon: {
                id : '',
                height : '0px'
            },
        }
    },
    methods: {
        toggleAccordion(id) {
            if (id === this.activeAccordeon.id) {
                this.activeAccordeon.id = '';
                return
            }
            this.activeAccordeon.id = id;
        }
    },
    props: {
        questionList: {
            type: Array,
            required: true,
        },
        faqImg: {
            type: String,
            required: true,
        },
    },
})