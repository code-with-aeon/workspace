const messageEl = document.querySelector('#message')
const showCards = document.querySelector('#showCards')
const showSum = document.querySelector('#sumEl')
const playerEl = document.querySelector('#player-el')

let sum = 0
let cards = []
let isAlive = false
let hasBlackJack = false
let message = ''

function startBTN() {
    isAlive = true
    const card1 = getRandomNumber()
    const card2 = getRandomNumber()
    sum = card1 + card2
    cards = [card1, card2]
    renderGame()
}
function newCardBTN() {
    if (isAlive === true && hasBlackJack === false) {
        const card3 = getRandomNumber()
        sum += card3
        cards.push(card3)
        renderGame()
    }
}

function renderGame() {
    let message = ''
    showCards.textContent = "Cards: "
    showSum.textContent = "Sum: " + sum
    
    for (let i = 0; i < cards.length; i++) {
        showCards.textContent += cards[i] + ", "
    }
    if (sum < 21) {
        message = "Do you want to draw a new card?"
    } else if (sum === 21) {
        hasBlackJack = true
        message = "You've got blackjack!"
    } else {
        message = "You're out of the game!"
        isAlive = false
    }
    messageEl.textContent = message
}

function getRandomNumber() {
    let randomCard = Math.floor(Math.random() * 13) + 1
    if (randomCard === 1) {
        return 11
    } else if (randomCard > 10) {
        return 10
    } else {
        return randomCard
    }
}