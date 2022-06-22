const navigationBars = document.querySelector('.navigation__bars')
const navigationList = document.querySelector(".navigation__list")

navigationBars.addEventListener('click', toggleNavigation)
navigationList.addEventListener('click', closeNavigationOnPick)

function toggleNavigation() {
    navigationList.classList.toggle('open')
}

function closeNavigation() {
    navigationList.classList.remove('open')
}

function closeNavigationOnPick(e) {
    if (!e.target.href) return

    closeNavigation()
}