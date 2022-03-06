const one = document.querySelector("#one")
const round = document.querySelector("#round")
const returnDiv = document.querySelector(".returnDiv")
const reutrnInpt = document.querySelector("#return")

one.setAttribute("checked", "")
returnDiv.setAttribute("hidden", "")
reutrnInpt.removeAttribute("required")

one.addEventListener("change", () => {
  returnDiv.setAttribute("hidden", "")
  reutrnInpt.removeAttribute("required")
})
round.addEventListener("change", () => {
  returnDiv.removeAttribute("hidden")
  reutrnInpt.setAttribute("required", "")
})
