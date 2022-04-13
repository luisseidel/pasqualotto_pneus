
function closeMenu() {
    if (document.querySelector("#openCloseMenu")) {
        var menu = document.querySelector("#openCloseMenu");
        
        if (menu.classList.contains('show')) {
            menu.classList.remove('show');
        }
    }

    if (document.querySelector("#open-btn")) {
        var btnAbrirFechar = document.querySelector("#open-btn");

        if (btnAbrirFechar.classList.contains("opened")) {
            btnAbrirFechar.classList.remove("opened");
            btnAbrirFechar.classList.add("collapsed");
            btnAbrirFechar.setAttribute('aria-expanded', btnAbrirFechar.classList.contains("opened"));
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    
    if (document.querySelector(".to-top-btn")) {
        var toTopButton = document.querySelector(".to-top-btn");
        
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            toTopButton.classList.add("d-block");
        } else {
            toTopButton.classList.remove("d-block");
        }
    }
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

        // document
        //     .getElementById("progress-bar")
        //     .style.setProperty("--scrollAmount", scrollPercent);
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
    if (document.querySelector("#banner-mobile")) {
        var slider = tns({
            container: "#banner-mobile",
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
    if (document.querySelector("#banner-desktop")) {
        var slider = tns({
            container: "#banner-desktop",
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
