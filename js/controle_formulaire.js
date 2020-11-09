// Contrôle le pseudo à l'input (au changement de valeur)
document.getElementById("pseudo").addEventListener("input", function (e) {
    const regexPseudo = /[^-_ A-Za-z0-9]/;
    if (e.target.value.length < 3) {
        validitePseudo = "Pseudo trop court";
    } else if (e.target.value.length > 12) {
        validitePseudo = "Pseudo trop long";
    } else if (regexPseudo.test(e.target.value)) {
        validitePseudo = "Caractère interdit";
    } else {
        validitePseudo = "\u2714\uFE0F";
    }
    document.getElementById("aidePseudo").textContent = validitePseudo;
});

const form = document.querySelector("form");

// Contrôle le mdp1 à l'input (au changement de valeur)
document.getElementById("mdp1").addEventListener("input", function (e) {
    const mdp1 = form.elements.mdp1.value;
    if (mdp1.length < 6) {
        validiteMdp1 = "Mot de passe trop court";
    } else {
        const regexMdp = /\d+/;
        if (!regexMdp.test(mdp1)) {
            validiteMdp1 = "Le mot de passe ne contient aucun chiffre";
        } else {
            validiteMdp1 = "\u2714\uFE0F";
        }
    }
    document.getElementById("infoMdp1").textContent = validiteMdp1;
});

// Contrôle le mdp2 à l'input (au changement de valeur)
document.getElementById("mdp2").addEventListener("input", function (e) {
    const mdp2 = form.elements.mdp2.value;
    if (mdp2.length < 6) {
        validiteMdp2 = "Mot de passe trop court";
    } else {
        const regexMdp = /\d+/;
        if (!regexMdp.test(mdp2)) {
            validiteMdp2 = "Le mot de passe ne contient aucun chiffre";
        } else {
            validiteMdp2 = "\u2714\uFE0F";
        }
    }
    document.getElementById("infoMdp2").textContent = validiteMdp2;
});

// Contrôle l'email à l'input (au changement de valeur)
document.getElementById("email").addEventListener("input", function (e) {
    // Correspond à une chaîne de la forme xxx@yyy.zzz
    let regexEmail = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regexEmail.test(e.target.value)) {
        validiteEmail = "Adresse email invalide";
    } else {
        validiteEmail = "\u2714\uFE0F";
    }
    document.getElementById("aideEmail").textContent = validiteEmail;
});


// Contrôle du formulaire à la validation (onclick)
function controle() {
    const pseudo = form.elements.pseudo.value;
    const regexPseudo = /[^_A-Za-z0-9]/;
    const mdp1 = form.elements.mdp1.value;
    const mdp2 = form.elements.mdp2.value;
    const email = form.elements.email.value;
    let regexEmail = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    
    if (pseudo.length < 3 || pseudo.length > 12 || regexPseudo.test(pseudo)) {
        document.getElementById("aidePseudo").textContent = "Pseudo obligatoire";
        return false;
    } else if (mdp1 != mdp2) {
        document.getElementById("infoMdp2").textContent = "Les mots de passe saisis sont différents";
        return false;
    } else if (!regexEmail.test(email)) {
        document.getElementById("aideEmail").textContent = "Adresse email obligatoire";
        return false;
    } else {
        return true;
    }
}