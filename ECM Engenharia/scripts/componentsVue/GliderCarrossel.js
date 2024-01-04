Vue.component('glidercarrossel', {
    template : gliderCarrosselTemplate,
   
    mounted() {

        // coloca validação no php para saber se a variável/Array tem mais de 0 itens

            new Glider(this.$refs.carrosselArea, {
                // Mobile-first defaults
                slidesToShow: 1.3,
                slidesToScroll: 1,
                scrollLock: true,
                dots: '#resp-dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [
                    {
                        // screens greater than >= 775px
                        breakpoint: 775,
                        settings: {
                            // Set to `auto` and provide item width to adjust to viewport
                            slidesToShow: 3,
                            slidesToScroll: 2,
                            itemWidth: 150,
                            duration: 0.25
                        }
                    }, {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 2,
                            itemWidth: 150,
                            duration: 0.25
                        }
                    }
                ]
            });
        
    }
})