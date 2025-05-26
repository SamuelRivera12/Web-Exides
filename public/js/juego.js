const emojis = ['🍎', '🍌', '🍇', '🍊', '🍓', '🍍', '🍒', '🥭'];
let cards = [];

function generateCards() {
    const doubledEmojis = emojis.concat(emojis);
    doubledEmojis.sort(() => Math.random() - 0.5);
    cards = doubledEmojis.map(emoji => {
        return {
            emoji: emoji,
            flipped: false
        };
    });
}

function renderCards() {
    const container = document.getElementById('cards-container');
    container.innerHTML = '';
    cards.forEach((card, index) => {
        const cardElement = document.createElement('div');
        cardElement.classList.add('card');
        if (card.flipped) {
            cardElement.textContent = card.emoji; // Mostramos el emoji como texto directamente
            cardElement.classList.add('flip');
        }
        cardElement.addEventListener('click', () => flipCard(index));
        container.appendChild(cardElement);
    });
}

function flipCard(index) {
    cards[index].flipped = true;
    renderCards();
    const flippedCards = cards.filter(card => card.flipped);
    if (flippedCards.length === 2) {
        setTimeout(checkMatch, 500);
    }
}

function checkMatch() {
    const flippedCards = cards.filter(card => card.flipped);
    if (flippedCards[0].emoji === flippedCards[1].emoji) {
        alert('Match found!');
    } else {
        flippedCards.forEach(card => card.flipped = false);
    }
    renderCards();
}

function resetGame() {
    generateCards();
    renderCards();
}

// Initialize the game
resetGame();