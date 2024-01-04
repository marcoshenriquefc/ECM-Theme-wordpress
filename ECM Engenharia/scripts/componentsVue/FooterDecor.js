Vue.component('footerdecor', {
    template : `
        <section id="footer-decor">
            <div class="header-footer">
                <div class="default-center">
                    <p class="text-footer">Siga-nos, uma empresa do grupo ECM Engenharia</p>
                    <div class="social-area" v-if="socialMediaData && socialMediaData.length > 0">
                        <a
                            v-for="socialItem in socialMediaData"
                            :href="socialItem.link"
                            class="social-item"
                            target="_blank"
                        >
                        <img :src="socialItem.icon" alt="Icone social media">
                        </a>
                    </div>
                </div>
            </div>

            <main class="body-footer">
                <div class="default-center">
                    <section class="grid-footer">
                        <div class="logo-area">
                            <svg class="logo" width="1334" height="153" viewBox="0 0 1334 153" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M747.712 118.465C775.027 118.465 792.712 101.832 792.712 76.444C792.712 51.056 775.027 34.4227 747.712 34.4227H717.949V118.465H747.712ZM695.187 15.1627H748.764C788.509 15.1627 815.648 39.6747 815.648 76.444C815.648 113.213 788.509 137.725 748.764 137.725H695.187V15.1627Z" fill="#FFF"/>
                                <path d="M931.718 118.64V137.725H839.795V15.1627H929.266V34.248H862.559V66.1147H921.738V84.8493H862.559V118.64H931.718Z" fill="#FFF"/>
                                <path d="M947.816 76.4441C947.816 39.8507 975.831 13.4121 1013.47 13.4121C1033.43 13.4121 1050.59 20.5908 1061.97 33.8974L1047.27 47.7294C1038.34 38.1001 1027.31 33.3721 1014.53 33.3721C989.136 33.3721 970.753 51.2321 970.753 76.4441C970.753 101.657 989.136 119.516 1014.53 119.516C1027.31 119.516 1038.34 114.789 1047.27 104.983L1061.97 118.991C1050.59 132.297 1033.43 139.476 1013.3 139.476C975.831 139.476 947.816 113.037 947.816 76.4441Z" fill="#FFF"/>
                                <path d="M1181.55 76.4441C1181.55 51.4054 1163.16 33.3721 1138.47 33.3721C1113.79 33.3721 1095.4 51.4054 1095.4 76.4441C1095.4 101.483 1113.79 119.516 1138.47 119.516C1163.16 119.516 1181.55 101.483 1181.55 76.4441ZM1072.47 76.4441C1072.47 40.2001 1100.48 13.4121 1138.47 13.4121C1176.47 13.4121 1204.48 40.0254 1204.48 76.4441C1204.48 112.863 1176.47 139.476 1138.47 139.476C1100.48 139.476 1072.47 112.688 1072.47 76.4441Z" fill="#FFF"/>
                                <path d="M1278.01 34.4227H1251.39V83.2733H1278.01C1297.97 83.2733 1308.3 74.168 1308.3 58.76C1308.3 43.352 1297.97 34.4227 1278.01 34.4227ZM1308.82 137.725L1283.79 101.832C1282.21 102.008 1280.63 102.008 1279.06 102.008H1251.39V137.725H1228.63V15.1627H1279.06C1311.27 15.1627 1331.23 31.6227 1331.23 58.76C1331.23 77.32 1321.78 90.9773 1305.15 97.4547L1333.33 137.725H1308.82Z" fill="#FFF"/>
                                <path d="M546.073 32.1935V43.6748H546.059V32.3935C546.059 32.3175 546.059 32.2548 546.073 32.1935Z" fill="#FFF"/>
                                <path d="M633.439 21.8374V152.892H589.748V32.7641C589.748 26.7228 584.863 21.8374 578.837 21.8374H556.969C551.113 21.8374 546.351 26.4148 546.073 32.1934C546.059 32.2548 546.059 32.3174 546.059 32.3934V43.6747H546.073V152.892H502.383V32.7641C502.383 26.7228 497.497 21.8374 491.472 21.8374H469.62C463.579 21.8374 458.693 26.7228 458.693 32.7481V43.6747H458.708V152.892H415.019V45.8948L418.177 43.6747L458.693 15.2881L480.531 0.000106769H524.236C534.207 0.000106769 542.637 6.7041 545.225 15.8588L546.059 15.2881L567.896 0.000106769H611.585C623.652 0.000106769 633.439 9.77078 633.439 21.8374Z" fill="#FFF"/>
                                <path d="M338.564 43.6747V32.7641C338.564 26.7228 333.679 21.8374 327.653 21.8374H262.125C256.084 21.8374 251.199 26.7228 251.199 32.7481V131.04H327.637C333.679 131.04 338.564 126.155 338.564 120.129V109.203H382.255V131.04C382.255 143.107 372.484 152.892 360.417 152.892H207.509V45.8948L210.668 43.6747L251.199 15.2881L273.037 0.000106769H360.417C366.459 0.000106769 371.913 2.43477 375.859 6.3961C379.804 10.3414 382.255 15.8121 382.255 21.8374V43.6747H338.564Z" fill="#FFF"/>
                                <path d="M230.948 43.672L230.933 43.688Z" fill="#FFF"/>
                                <path d="M131.055 43.6747V32.7641C131.055 26.7228 126.17 21.8374 120.144 21.8374H54.6011C48.6527 21.8374 43.8292 26.5681 43.6901 32.4708V65.5121H131.055V87.3654H43.6901V131.04H120.129C126.17 131.04 131.055 126.155 131.055 120.129V109.203H174.745V131.04C174.745 137.065 172.295 142.536 168.349 146.497C164.389 150.443 158.933 152.892 152.908 152.892H0V45.8948L3.15937 43.6747L43.6901 15.2881L65.5276 0.000106769H152.908C158.933 0.000106769 164.389 2.43477 168.349 6.3961C172.295 10.3414 174.745 15.8121 174.745 21.8374V43.6747H131.055Z" fill="#FFF"/>
                            </svg>

                        </div>

                        <section class="navegation-footer">
                            <ul  v-if="navegation && navegation.length > 0">
                                <li class="text-footer" v-for="navegationItem in navegation" :key="navegationItem.label">
                                    <a :href="navegationItem.link">
                                        {{ navegationItem.label }}
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <section class="contact-footer">
                            <div v-if="contact && contact.length > 0">
                                <h1 class="text-footer title">Contatos</h1>
                                <ul>
                                    <li class="text-footer" v-for="contactNumber in contact" :key="contactNumber">
                                        {{ contactNumber }}
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </section>

                    <section class="copy-footer">
                        <div>
                            ECM Decor © Todos os direitos reservados | Desenvolvido por <a href="https://vupes.com.br" target="_blank">Agência Vupes</a>
                        </div>
                        <div class="vupes-logo">
                            <a href="https://vupes.com.br" target="_blank">
                                <img src="https://ecmeng.com.br/wp-content/uploads/2023/10/vupes-white.png" alt="logo da Vupes">
                            </a>
                        </div>
                    </section>
                </div>
            </main>
        </section>
    `,
    props : {
        socialMediaData : {
            type: Array,
            required: false,
        },
        // {
        //      icon : string,
        //      link : string
        // }
        navegation : {
            type : Array,
            required: false,
        },
        // {
        //      title    : string,
        //      link : string
        // }
        contact : {
            type : Array,
            required: false,
        }
        // Array<string>
    }

})