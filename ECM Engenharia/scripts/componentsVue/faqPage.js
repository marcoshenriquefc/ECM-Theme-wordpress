Vue.component('faqpage', {
    template: `
        <section id="decor">
            <navmenu/>

            <section class="faq-image" v-if="faqImage && faqImage.desktop">
                <img class='desktop' :src="faqImage.desktop">
                <img class='mobile' :src="faqImage.mobile ? faqImage.mobile : faqImage.desktop">
            </section>
    
            <div id="body-page">
                <section class="default-center faq-area">
                    <h1 class="section-title center">
                        Perguntas <br><span class="dark">Frequentes</span>
                    </h1>
                
                <accordeonarea
                    :questionList="faqQuestionList"
                />
            </div>


                <footerdecor
                    :social-media-data="footerData.socialMediaList"
                    :contact="footerData.contact"
                    :navegation="footerData.navegationMenu"
                />
        </section>
    `,
    data() {
        return {
            faqImage : faqImage,

            faqQuestionList: faqQuestionList,

            footerData: {
                socialMediaList : socialMedia,
                navegationMenu : navigationFooter,
                contact : contactFooter,
            },
        };
    },
})