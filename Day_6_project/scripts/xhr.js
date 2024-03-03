let buttonThree = document.getElementById('three');
let divThree = document.getElementsByTagName('div')[0];

buttonThree.addEventListener('click', displayJoke);

function displayJoke() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "https://icanhazdadjoke.com", false);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.send();

    if (xhr.readyState === 4 && xhr.status === 200) {
        const jokeObject = JSON.parse(xhr.responseText);
        const lowercaseJoke = jokeObject.joke.toLowerCase();
        divThree.innerHTML = lowercaseJoke;
    } else {
        console.error('Error:', xhr.status);
    }
}
