function setTimeFieldToOne() {
    document.getElementById('visiting-time').value = '1';
}
setTimeout(setTimeFieldToOne, 30000); 

document.querySelector('form').addEventListener('submit', function(event) {
    const phoneInput = document.getElementById('phone');
    const phonePattern = /^\+?\d{10,15}$/; // Или более сложное регулярное выражение
    if (!phonePattern.test(phoneInput.value)) {
        alert('Введите корректный номер телефона.');
        event.preventDefault();
    }
});
