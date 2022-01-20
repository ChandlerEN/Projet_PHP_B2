document.documentElement.classList.add('js-loading')
window.addEventListener("load", showPage);

function showPage() {
  document.documentElement.classList.remove('js-loading');
}