const bars = document.getElementById("bars")
const sidebar = document.querySelector(".sidebar")
const times = document.getElementById("times")

bars.addEventListener("click" , () => {
    sidebar.classList.add("open")
})

times.addEventListener("click" , () => {
    sidebar.classList.remove("open")
})