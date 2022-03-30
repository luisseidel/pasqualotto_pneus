function show() {
  const sidebar = document.querySelector("#slide-navbar-collapse");
  sidebar.classList.add("show");
  console.log(sidebar.classList);
  document.body.style.overflow = "hidden";
}
function hide() {
  const sidebar = document.querySelector("#slide-navbar-collapse");
  console.log(sidebar.classList);
  document.body.style.overflow = "";
}
function toggle() {
  const sidebar = document.querySelector("#slide-navbar-collapse");
  console.log(sidebar.classList);
  sidebar.classList.contains("show") ? hide() : show();
}

// Set cookie consent
function acceptCookieConsent() {
  var cookienotice = document.getElementById("cookieNotice");

  if (cookienotice.classList.contains("inactive")) {
    cookienotice.classList.remove("inactive");
  } else {
    cookienotice.classList.add("inactive");
  }
}

jQuery(document).ready(function ($) {
  $("#nav-icon4").click(function () {
    $(this).toggleClass("open");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  //Scroll Progress Bar
  let processScroll = () => {
    let docElem = document.documentElement,
      docBody = document.body,
      scrollTop = docElem["scrollTop"] || docBody["scrollTop"],
      scrollBottom =
        (docElem["scrollHeight"] || docBody["scrollHeight"]) -
        window.innerHeight,
      scrollPercent = (scrollTop / scrollBottom) * 100 + "%";

    document
      .getElementById("progress-bar")
      .style.setProperty("--scrollAmount", scrollPercent);
  };

  document.addEventListener("scroll", processScroll);

  //Form Contato Whatsapp
  if (document.querySelector(".contato-form")) {
    var form = document.querySelector(".contato-form");

    form.addEventListener("submit", function (e) {
      e.preventDefault();

      var phone = document.getElementById("whatsapp-number").value;
      console.log(phone);
      var nome = document.querySelector("#nome").value.trim();
      var text = document.querySelector("#mensagem").value.trim();

      if (nome == "" || text == "") {
        window.alert("Preencha corretamente os campos!");
        form.reset();
        return;
      }

      var mensagem = `Nome: ${nome} Mensagem: ${text}`;
      mensagem = encodeURIComponent(mensagem);
      var link = `https://api.whatsapp.com/send?phone=${phone}&text=${mensagem}`;

      window.open(link);
      form.reset();
    });
  }

  //slider mobile config
  if (document.querySelector(".slider-banner.mobile")) {
    var slider = tns({
      container: ".slider-banner.mobile",
      items: 1,
      slideBy: "page",
      autoplay: true,
      controls: false,
      mouseDrag: true,
      nav: false,
      autoplayButton: false,
      autoplayButtonOutput: false,
    });
  }

  //slider desktop config
  if (document.querySelector(".slider-banner.desktop")) {
    var slider = tns({
      container: ".slider-banner.desktop",
      items: 1,
      slideBy: "page",
      autoplay: true,
      controls: false,
      mouseDrag: true,
      nav: false,
      autoplayButton: false,
      autoplayButtonOutput: false,
    });
  }

  // if (document.querySelector('.slider-pneus')) {
  //     var slider = tns({
  //         container: '.slider-pneus',
  //         items: 1,
  //         slideBy: 1,
  //         autoplay: true,
  //         controls: false,
  //         mouseDrag: true,
  //         nav: true,
  //         navPosition: "bottom",
  //         autoplayButton: false,
  //         autoplayButtonOutput: false,
  //         responsive: {
  //             600: {
  //                 edgePadding: 20,
  //                 gutter: 20,
  //                 items: 2,
  //                 slideBy: 2,
  //             },
  //             700: {
  //                 gutter: 30
  //             },
  //             900: {
  //                 items: 3,
  //                 slideBy: 3
  //             },
  //         }
  //     });
  //}
});
