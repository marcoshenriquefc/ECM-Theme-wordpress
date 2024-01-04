Vue.component('popuparea', {
    template : `
        <section id="popup-area" @click.self="$emit('closePopup')">
            <div class="popup-box">
                <div class="close-area">
                    <span class="close" @click="$emit('closePopup')">X</span>
                </div>
                <slot></slot>
            </div>
        </section>
    `,
    emits   : ['closePopup'],
})