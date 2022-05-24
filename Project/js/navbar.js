var c=!1;

function hideandshow(e) {
  var elem = $(e);
  c ? elem.slideUp(300) : elem.slideDown(300);
  c=!c;
}