Vue.component('decorpage', {
  template : `
    <section id="decor">
        <navmenu/>

        <carrosselhero :itens-carrossel="heroBanners"/>
        <div id="body-page">
            <inforoons
                class="second-area"
                :roonsList="roonsList"
                @toClickItem="popupItens"
            />

            <aboutus
                :title="aboutUs.title"
                :text="aboutUs.text"
                :image="aboutUs.image"
            />

            <environmentsarea
                :data-environments="dataEnvironments"
            />

            <detailsarea
                :image="exclusiveDataImg"
                :cardsData="exclusiveData"
            />

            <galeryarea
                :imagesList="galeryImages"
            />

            <glidercarrossel/>
            
            <registerformarea 
                title="Criamos um espaço tão único quanto você."
                :image="imageRegisterForm"
            />

            <popuparea
                v-if="popup.active && popup.type"
                @closePopup="closePopup"
            >
                <ul class="list-itens" v-if="popup.type === 'itens'">
                    <li v-for="item in itensPopup"> {{ item }} </li>
                </ul>
            </popuparea>
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
            imageAboutUs : aboutUs.image,
            banner1 : banner1,
            banner2 : banner2,
            banner3 : banner3,
            icon    : './images/icon2.png',
            imageRegisterForm : './images/form.jpg',

            itensPopup : [],

            heroBanners : heroBanners,

            roonsList : roonsList,

            aboutUs : aboutUs,

            dataEnvironments : dataEnvironments,

            galeryImages : galeryImages,

            exclusiveData : exclusiveData,

            // dataCarrossel : dataCarrossel,

            footerData: {
                socialMediaList : socialMedia,
                navegationMenu : navigationFooter,
                contact : contactFooter,
            },

            popup : {
                active  : false,
                type    : '' 
            },
        }
    },
    methods: {
        popupItens(itens) {
            this.itensPopup = itens
            this.openPopup('itens')
            
        },
        openPopup(type) {
            this.popup.type = type
            this.popup.active = true;
            console.log('itens', this.popup)
        },
        closePopup() {
            this.popup.active   = false;
            this.popup.type     = '';
        }
    }
})