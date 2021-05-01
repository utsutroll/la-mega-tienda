new Glider(document.querySelector('.carousel__lista'), {
    slidesToShow: 4,
    slidesToScroll: 4,
    draggable: true,
    dots: '.carousel__indicadores',
    arrows: {
      prev: '.carousel__anterior',
      next: '.carousel__siguiente'
    },
    responsive: [
      {
        // screens greater than >= 350px
        breakpoint: 350,
        settings: {
          // Set to `auto` and provide item width to adjust to viewport
          slidesToShow: '1',
          slidesToScroll: '1',
          draggable: true,  
        }
      },{
        // screens greater than >= 775px
        breakpoint: 775,
        settings: {
          // Set to `auto` and provide item width to adjust to viewport
          slidesToShow: '2',
          slidesToScroll: '2',
          draggable: true,  
        }
      },{
        // screens greater than >= 1024px
        breakpoint: 1024,
        settings: {
            slidesToShow: 'auto',
            slidesToScroll: 'auto',

        }
      }
    ]
});