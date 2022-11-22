// Mute audio volume
let a = document.getElementById("audio");

function mute() {
  if (a.muted) {
    a.muted = false;
  } else {
    a.muted = true;
  }
}
// Menu white
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop()) {
      $(".header").addClass("sticky");
    } else {
      $(".header").removeClass("sticky");
    }
  });
});
// Menu active
let header = document.getElementsByClassName("search-rooms");
let btns = document.getElementsByClassName("search-tabs");
for (let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    let current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
// Person
$("input.input-qty").each(function () {
  var $this = $(this),
    qty = $this.parent().find(".is-form"),
    min = Number($this.attr("min")),
    max = Number($this.attr("max"));
  if (min == 0) {
    var d = 0;
  } else d = min;
  $(qty).on("click", function () {
    if ($(this).hasClass("minus")) {
      if (d > min) d += -1;
    } else if ($(this).hasClass("plus")) {
      var x = Number($this.val()) + 1;
      if (x <= max) d += 1;
    }
    $this.attr("value", d).val(d);
  });
});

function zoom(image) {
  let src = image.src;
  document.getElementById("fame").style.backgroundImage = "url(" + src + ")";
}
