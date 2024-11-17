const clonableContent = document.querySelector("#li-template").content
let ourTimer = null;
let previousSearchValue = "";
const searchField = document.querySelector("#search-field");
const searchOverlay = document.querySelector("#search-overlay");

document.querySelector("#search-icon").addEventListener("click", openSearch)

function openSearch() {
  searchOverlay.classList.remove("invisible", "opacity-0", "scale-125")
  searchOverlay.classList.add("scale-100", "opacity-100")

  setTimeout(() => {
    searchField.focus()
  }, 50)
}
document.querySelector("#close-overlay-icon").addEventListener("click", closeSearch)

function closeSearch() {
  searchOverlay.classList.add("scale-125", "opacity-0")
  searchOverlay.classList.remove("scale-100", "opacity-100")
  searchField.blur()
  setTimeout(() => {
    searchOverlay.classList.add("invisible")
  }, 301)
}

searchField.addEventListener("keyup", handleInputChange)

function handleInputChange(e) {
  // when to show spinner loader and hide default message
  if (e.target.value.trim() != previousSearchValue) {
    if (e.target.value.trim() != "") {
      document.querySelector("#loading-icon").classList.remove("hidden")
      document.querySelector("#default-message").classList.add("hidden")
      document.querySelector("#no-results-message").classList.add("hidden")
      document.querySelector("#results-area").classList.add("hidden")


    }

    if (e.target.value.trim() == "") {
      document.querySelector("#loading-icon").classList.add("hidden")
      document.querySelector("#default-message").classList.remove("hidden")
      document.querySelector("#no-results-message").classList.add("hidden")
      document.querySelector("#results-area").classList.add("hidden")
      clearTimeout(ourTimer)
      return
    }

    clearTimeout(ourTimer)

    ourTimer = setTimeout(() => {
      actuallyFetchData(e.target.value)
    }, 750)
  }

  previousSearchValue = e.target.value.trim()

}

async function actuallyFetchData(term) {
  // 1 actually fetch the data
  const results = await getResultsData(term)
  console.log(results)

  if (results.length == 0) {
    document.querySelector("#no-results-message").classList.remove("hidden")
    document.querySelector("#loading-icon").classList.add("hidden")
    return
  }

  const wrapper = document.createDocumentFragment()
  console.log(clonableContent)
  results.forEach(item => {
    const clone = clonableContent.cloneNode(true)
    clone.querySelector("a").href = item.url
    clone.querySelector(".title-text").textContent = item.title
    wrapper.appendChild(clone)
  })

  document.querySelector("#results-area").innerHTML = ""
  document.querySelector("#results-area").appendChild(wrapper)

  document.querySelector("#results-area").classList.remove("hidden")
  document.querySelector("#loading-icon").classList.add("hidden")

}

async function getResultsData(term) {
  const resultsPromise = await fetch(ourData.root_url + `/wp-json/wp/v2/search?search=${term}`)
  const results = await resultsPromise.json()
  return results
}
