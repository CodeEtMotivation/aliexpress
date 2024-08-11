//import './bootstrap';

//import Alpine from 'alpinejs';

//window.Alpine = Alpine;

//Alpine.start();

// Selection de l'input et de l'icone 

 // Attendre que le DOM soit complètement chargé
 document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner l'élément <div> avec l'id "5k"
    var div5k = document.getElementById('5k');
    var div8k = document.getElementById('8k');
    var div10k = document.getElementById('10k');
    var div20k = document.getElementById('20k');
    var div30k = document.getElementById('30k');
    var div50k = document.getElementById('50k');
    var div80k = document.getElementById('80k');
    var div100k = document.getElementById('100k');
    var div150k = document.getElementById('150k');
    var div200k = document.getElementById('200k');
    var div300k = document.getElementById('300k');
    var div500k = document.getElementById('500k');
    // Sélectionner l'élément <input> avec l'id "montantrecharger"
    var inputMontant = document.getElementById('montantrecharger');
    
    // Ajouter un gestionnaire d'événement de clic à l'élément <div>
    div5k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 5000
        inputMontant.value = 5000;
    });
    div8k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 8000
        inputMontant.value = 8000;
    });
    div10k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 10000
        inputMontant.value = 10000;
    });
    div20k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 20000
        inputMontant.value = 20000;
    });
    div30k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 30000
        inputMontant.value = 30000;
    });
    div50k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 50000
        inputMontant.value = 50000;
    });
    div5k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 5000
        inputMontant.value = 5000;
    });
    div80k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 80000
        inputMontant.value = 80000;
    });
    div100k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 100000
        inputMontant.value = 100000;
    });
    div150k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 150000
        inputMontant.value = 150000;
    });
    
    div200k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 200000
        inputMontant.value = 200000;
    });
    div300k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 300000
        inputMontant.value = 300000;
    });
    div500k.addEventListener('click', function() {
        // Définir la valeur de l'input sur 500000
        inputMontant.value = 500000;
    });
});

