console.log('Hello, Blade!');

const nameForm = document.getElementById('nameForm');
if (nameForm) {
    nameForm.onsubmit = function() {
        const name = (document.querySelector('input[name="name"]') as HTMLInputElement).value;
        const nickname = (document.querySelector('input[name="nickname"]') as HTMLInputElement).value;
        return confirm(`Name: ${name}\nNickname: ${nickname}\n送信しますか？`);
    };
}
