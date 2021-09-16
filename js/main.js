const swiper = new Swiper('.swiper-container', {
  loop: true,
  // Navigation arrows
  navigation: {
    nextEl: '.case-button-next',
    prevEl: '.case-button-prev',
  },
});

$(function () {
  $(window).scroll(function () {

    if ($(this).scrollTop() > 500) {

      $('#toTop').fadeIn();

    } else {

      $('#toTop').fadeOut();

    }

  });

  $('#toTop').click(function () {

    $('body,html').animate({ scrollTop: 0 }, 800);

  });

});

var menuButton = $(".menu-button");
var body = $("body");
menuButton.on("click", function () {
  $(".mobile-menu").toggleClass("mobile-menu--visible");
  body.toggleClass("fixed");
});



var modalButton = $("[data-toggle=modal]");
var closeModalButton = $(".modal__close");
var closeModalOverlay = $(".modal__overlay");
modalButton.on("click", openModal);
closeModalButton.on("click", closeModal);
closeModalOverlay.on("click", closeModal);

function openModal() {
  var modalOverlay = $(".modal__overlay");
  var modalDialog = $(".modal__dialog");
  var body = $("body");
  modalOverlay.addClass('modal__overlay--visible');
  modalDialog.addClass('modal__dialog--visible');
  body.addClass('modal-open');
}
function closeModal(event) {
  event.preventDefault();
  var modalOverlay = $(".modal__overlay");
  var modalDialog = $(".modal__dialog");
  var body = $("body");
  modalOverlay.removeClass('modal__overlay--visible');
  modalDialog.removeClass('modal__dialog--visible');
  body.removeClass('modal-open');
}

$(document).on('keydown', function (event) {
  if (event.keyCode == 27) {
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.removeClass('modal__overlay--visible');
    modalDialog.removeClass('modal__dialog--visible');
  }
});

$("#myModal").on("click", function () {
  $("body").toggleClass("modal-open");
});
$("#myModal-1").on("click", function () {
  $("body").toggleClass("modal-open");
});

//обработка форм 
$(".modal__form").validate({
  errorClass: "form-subscribe",
  messages: {
    name_modal: {
      required: "Пожалуйста, укажите имя",
      minlength: "Имя не долно быть меньше 2 символов"
    },
    email_modal: {
      required: "Нам нужен ваш e-mail, чтобы связаться с вами",
      email: "Ваш e-mail должен быть в формате - name@domain.com"
    },
    phone_modal: {
      required: "Телефон обязателен",
      minlength: "Телефон должен быть не меньше 11 символов"
    },
  },
});
$(".footer__search").validate({
  errorClass: "subscribe-validate",
  messages: {
    subscribe: {
      required: "Нам нужен ваш e-mail, чтобы связаться с вами",
      email: "Ваш e-mail должен быть в формате - name@domain.com"
    },
  },
})

$('.telephone').mask("+7(000)000-00-00", {
  translation: {
    placeholder: "(000)000-00-00"
  }
});