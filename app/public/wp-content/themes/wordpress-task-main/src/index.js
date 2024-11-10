const searchOverlay = document.querySelector("#search-overlay");


document.querySelector("#search-icon").addEventListener("click", openSearch)

function openSearch() {
  searchOverlay.classList.remove("invisible")
}

document.querySelector("#close-overlay-icon").addEventListener("click", closeSearch)

function closeSearch() {
  searchOverlay.classList.add("invisible")
}