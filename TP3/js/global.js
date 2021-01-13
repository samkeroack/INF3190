function validerFormulaire() {
    var nomValide = validerNom("nom", "nom-erreur");
    var typeValide = validerChamps("type", "type-erreur");
    var raceValide = validerChamps("race", "race-erreur");
    var ageValide = validerAge("age", "age-erreur");
    var descriptionValide = validerChamps("description", "description-erreur");
    var courrielValide = validerCourriel("courriel", "courriel-erreur");
    var adresseValide = validerChamps("adresse", "adresse-erreur");
    var villeValide = validerChamps("ville", "ville-erreur");
    var cpValide = validerCodePostal("cp", "cp-erreur");

    return nomValide && typeValide && raceValide && ageValide && descriptionValide && courrielValide && adresseValide && villeValide && cpValide;
}

function validerChamps(inputId, spanId) {
    var champ = document.getElementById(inputId).value;
    var valide = true;
    document.getElementById(spanId).innerHTML = "";
    document.getElementById(inputId).style.borderColor = "black";
    if (champ == null || champ === "") {
        document.getElementById(spanId).innerHTML = "Ce champ est obligatoire.";
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
        valide = false;
    } else if (champ.includes(',')) {
        document.getElementById(spanId).innerHTML = "Le champ ne peut pas contenir de virgule.";
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
        valide = false;
    }
    return valide;
}

function validerAge(inputId, spanId) {
    var champ = document.getElementById(inputId).value;
    var valide = true;
    document.getElementById(spanId).innerHTML = "";
    document.getElementById(inputId).style.borderColor = "black";
    if (champ == null || champ === "") {
        document.getElementById(spanId).innerHTML = "Ce champ est obligatoire.";
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
        valide = false;
    } else if (champ<0 || champ>30) {
        document.getElementById(spanId).innerHTML = "L'&acirc;ge doit se trouver entre 0 et 30 ans.";
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
        valide = false;
    }
    return valide;
}


function validerNom(inputId, spanId) {
    var champ = document.getElementById(inputId).value;
    var valide = true;
    var message = "";
    document.getElementById(spanId).innerHTML = "";
    document.getElementById(inputId).style.borderColor = "black";
    if (champ == null || champ === "") {
        message = "Ce champ est obligatoire.";
        document.getElementById(spanId).innerHTML = message;
        valide = false;
    } else {

        if (champ.includes(',')) {
            message += " Le nom ne peut pas contenir de virgule.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
        if (champ.length > 20 || champ.length < 3) {
            message += " Le nom doit contenir entre 3 et 20 caractères.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
    }
    if (!valide) {
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
    }
    return valide;
}


function validerCourriel(inputId, spanId) {
    var email = document.getElementById(inputId).value;
    var message = "";
    var valide = true;
    const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    document.getElementById(spanId).innerHTML = "";
    document.getElementById(inputId).style.borderColor = "black";
    if (email == null || email === "") {
        message = "Ce champ est obligatoire.";
        document.getElementById(spanId).innerHTML = message;
        valide = false;
    } else {

        if (email.includes(',')) {
            message += " Le courriel ne peut pas contenir de virgule.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
        if (!regex.test(email)) {
            message += " Ce courriel n'est pas valide.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
    }
    if (!valide) {
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
    }
    return valide;
}

function validerCodePostal(inputId, spanId) {
    var email = document.getElementById(inputId).value;
    var message = "";
    var valide = true;
    const regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;

    document.getElementById(spanId).innerHTML = "";
    document.getElementById(inputId).style.borderColor = "black";
    if (email == null || email === "") {
        message = "Ce champ est obligatoire.";
        document.getElementById(spanId).innerHTML = message;
        valide = false;
    } else {

        if (email.includes(',')) {
            message += " Le code postal ne peut pas contenir de virgule.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
        if (!regex.test(email)) {
            message += " Ce code postal n'est pas valide.";
            document.getElementById(spanId).innerHTML = message;
            valide = false;
        }
    }
    if (!valide) {
        document.getElementById(spanId).style.color = "red";
        document.getElementById(inputId).style.borderColor = "red";
    }
    return valide;
}

