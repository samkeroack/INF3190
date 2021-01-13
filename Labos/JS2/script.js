function validerFormulaire() {
    var dateFormatValide = validerDate();
    var nomValide = validerChamps("nom", "nom-erreur");
    var prenomValide = validerChamps("prenom","prenom-erreur");
    var dateValide = validerChamps("date","date-erreur");
    var codeValide = validerChamps("code", "code-erreur");
    var genreValide = validerChamps("genre","genre-erreur");
    var genreFormatValide = validerGenre();
    let codeFormatValide = validerCode();

    var champsValide = nomValide && prenomValide && dateValide && codeValide && genreValide;

    return dateFormatValide && champsValide && genreFormatValide && codeFormatValide;
}

function validerDate() {
    var date = document.getElementById("date").value;
    //https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Expressions_r%C3%A9guli%C3%A8res
    // dans la dernière section "Utiliser les caractères spéciaux pour vérifier la saisie"
    //vous pourrez retrouver l'explication pour cette expression regulière. "/g" fait partie de la notation
    //vous pourrez retrouver l'explication pour cette expression regulière. "/g" fait partie de la notation
    // pour la fonction match
    if(! date.match(/(\d{4})-(\d{2})-(\d{2})/g)){
        document.getElementById("date-erreur").innerHTML = "Ce format n'est pas valide.";
        document.getElementById("date-erreur").style.color = "red";
        return false;
    }
    return true;
}

function validerChamps(inputId, spanId) {
    var champ = document.getElementById(inputId).value;

    if(champ == null || champ === ""){
        document.getElementById(spanId).innerHTML = "Ce champ est obligatoire.";
        document.getElementById(spanId).style.color = "red";
        return false;
    }
    return true;
}

function validerGenre() {
    var genre = document.getElementById("genre").value;

    if(genre !== "F" && genre !== "M"){
        document.getElementById("genre-erreur").innerHTML = "Les valeurs acceptées sont F ou M.";
        document.getElementById("genre-erreur").style.color = "red";
        return false;
    }
    return true;
}

function validerCode() {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var date = document.getElementById("date").value;
    var genre = document.getElementById("genre").value;
    var code = document.getElementById("code").value;

    //https://stackoverflow.com/questions/990904/remove-accents-diacritics-in-a-string-in-javascript
    //Vous pouvez retrouver l'explication pour ces expressions dans la 1ere réponse mais c'est en anglais.
    //Normalize('NFD') décompose les lettres accentuées è devient ` e et ensuite le caractère ` est remplacé par "".
    //[\u0300-\u036f] représente les unicodes des accents
    var nomSansAccent = nom.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    var prenomSansAccent = prenom.normalize('NFD').replace(/[\u0300-\u036f]/g,"");

    var annee = date.substring(2,4);
    var mois = date.substring(5,7);
    var jour = date.substring(8);
    var sequence = code.substring(10);

    var nomTroisLettre = nomSansAccent.substring(0,3).toUpperCase();
    var prenomUnelettre = prenomSansAccent.substring(0,1).toUpperCase();

    if(genre === "F"){
        mois = parseInt(mois) + 50;
    }
    var codePermanent = nomTroisLettre + prenomUnelettre + jour + mois + annee + sequence;

    if(code !== codePermanent || isNaN(sequence)){
        document.getElementById("code-erreur").innerHTML = "Code permanent invalide.";
        document.getElementById("code-erreur").style.color = "red";
        return false;
    }
    return true;
}
