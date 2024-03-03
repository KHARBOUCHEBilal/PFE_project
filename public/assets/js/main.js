$(window).scroll(function () {
  if ($(this).scrollTop() > 60) {
    $("nav").addClass("bg-enable").removeClass("bg-desible");
  } else {
    $("nav").addClass("bg-desible").removeClass("bg-enable");
  }
});

var modal = document.getElementById("id01");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

$(".navbar-nav .nav-item>a").on("click", function () {
  $(".navbar-nav .active").removeClass("active");
  $(this).addClass("active");
  $(".navbar-collapse").collapse("hide");
});

var swiperDev = document.querySelector(".swiper");
if (swiperDev) {
  new Swiper(".swiper", {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    slidesPerView: "auto",
    pagination: {
      el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}

// open and cloce the fullscreen in deferent browsers
const openFullScreen = (el) => {
  if (el.requestFullscreen) {
    el.requestFullscreen();
  } else if (el.msRequestFullscreen) {
    el.msRequestFullscreen();
  } else if (el.mozRequestFullScreen) {
    el.mozRequestFullScreen();
  } else if (el.webkitRequestFullscreen) {
    el.webkitRequestFullscreen();
  }
};
const cancelFullScreen = () => {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  }
};

// the card buttons
const CloseBody = () => {
  const pageBpdy = document.getElementById("page-body");
  pageBpdy.classList.add("hide");
};
const HideBody = () => {
  const pageBpdy = document.getElementById("body-content");
  pageBpdy.classList.toggle("hide");
};
const pageFullScreen = () => {
  const toggle = document.getElementById("page");
  toggle.classList.toggle("full-screen");
  const isFullScreen = toggle.classList.value.indexOf("full-screen");
  const body = document.getElementById("page");
  const elem = body.requestFullscreen();
  if (isFullScreen > -1) {
    openFullScreen(elem);
    localStorage.setItem("isPageFullScreen", "yes");
    body.classList.add("full-screen");
  } else {
    cancelFullScreen();
    localStorage.setItem("isPageFullScreen", "no");
    body.classList.remove("full-screen");
  }
};

const closeBody = document.getElementById("close-body");
if (closeBody) {
  closeBody.addEventListener("click", () => {
    CloseBody();
  });
}

const hideBody = document.getElementById("hide-body");
if (hideBody) {
  hideBody.addEventListener("click", () => {
    HideBody();
  });
}
const pageFS = document.getElementById("page-full-screen");
if (pageFS) {
  pageFS.addEventListener("click", () => {
    pageFullScreen();
  });
}

// the full screen toggel function

const fullscreenToggle = () => {
  const toggle = document.getElementById("toggle-fullscreen");
  toggle.classList.toggle("full-screen");
  const isFullScreen = toggle.classList.value.indexOf("full-screen");
  if (isFullScreen > -1) {
    const elem = document.documentElement.requestFullscreen();
    openFullScreen(elem);
    localStorage.setItem("isFullScreen", "yes");
  } else {
    cancelFullScreen();
    localStorage.setItem("isFullScreen", "no");
  }
};

// the switch button function

const Switch = document.getElementById("CheckStatus");
const CheckStatus = document.getElementById("CheckStatusInput");
if (Switch) {
  Switch.addEventListener("click", function () {
    const check = CheckStatus.getAttribute("checked");
    if (check) {
      CheckStatus.removeAttribute("checked");
    } else {
      CheckStatus.setAttribute("checked", true);
    }
  });
}

// the drop down menu function for sidebar
const dropDownMenu = () => {
  const menus = document.querySelectorAll(".sidebar .sidebar-menu .menu-item");
  const items = document.querySelectorAll(
    ".sidebar .sidebar-menu .menu-item .list-item"
  );

  items.forEach((item) => {
    item.addEventListener("click", (e) => {
      items.forEach((item) => {
        item.classList.remove("active");
      });
      e.target.classList.add("active");
    });
  });

  menus.forEach((item) => {
    item.addEventListener("click", (e) => {
      element = e.target.parentElement.parentElement;
      element.classList.toggle("active");

      if (element.classList.contains("active")) {
        element.querySelector(".close").style.display = "none";
        element.querySelector(".open").style.display = "block";
      } else {
        element.querySelector(".open").style.display = "none";
        element.querySelector(".close").style.display = "block";
      }
    });
  });
};

dropDownMenu();

var toggler = document.querySelector(".sidebar-toggler");
if (toggler) {
  toggler.addEventListener("click", (e) => {
    document.querySelector(".sidebar").classList.toggle("show");

    content_area = document.getElementById("content-area");
    if (content_area) {
      content_area.classList.toggle("no-sidebar");
      content_area.classList.toggle("active");
    }
  });
}
$(window).scroll(function () {
  if ($(this).scrollTop() > 50) {
    $(".sidebar").addClass("fixed").removeClass("moved");
  } else {
    $(".sidebar").addClass("moved").removeClass("fixed");
  }
});

$(".tags #tag").click(function () {
  $(this).toggleClass("active");
});
