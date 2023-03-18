var headerEnfant = document.getElementsByClassName("headerTitre")[0].children;

var listFontFamily = ["Arial, sans-serif",
    "Helvetica, sans-serif",
    "Verdana, sans-serif",
    "Trebuchet MS, sans-serif",
    "Gill Sans, sans-serif",
    "Noto Sans, sans-serif",
    "Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif",
    "Optima, sans-serif",
    "Arial Narrow, sans-serif",
    "sans-serif",

    "Times, Times New Roman,serif",
    "Didot,serif",
    "Georgia,serif",
    "Palatino, URW Palladio L,serif",
    "Bookman, URW Bookman L,serif",
    "New Century Schoolbook, TeX Gyre Schola,serif",
    "American Typewriter,serif",
    "serif",

    "Andale Mono, monospace",
    "Courier New, monospace",
    "Courier, monospace",
    "FreeMono, monospace",
    "OCR A Std, monospace",
    "DejaVu Sans Mono, monospace",
    "monospace",

    "Comic Sans MS, Comic Sans, cursive",
    "Apple Chancery, cursive",
    "Bradley Hand, cursive",
    "Brush Script MT, Brush Script Std, cursive",
    "Snell Roundhand, cursive",
    "URW Chancery L, cursive",
    "cursive",

    "Impact, fantasy",
    "Luminari, fantasy",
    "Chalkduster, fantasy",
    "Jazz LET, fantasy",
    "Blippo, fantasy",
    "Stencil Std, fantasy",
    "Marker Felt, fantasy",
    "Trattatello, fantasy",
    "fantasy"];

var listFontStyle = ["normal", "italique", "bold"];

for (let i = 0; i < headerEnfant.length; i++) {
    //styleAlea(headerEnfant[i]);
}

function styleAlea(obj) {
    obj.style.fontFamily = listFontFamily[Math.floor(Math.random() * listFontFamily.length)];
    obj.style.fontStyle = listFontStyle[Math.floor(Math.random() * listFontStyle.length)];

    setTimeout(function () {
        styleAlea(obj);
    }, ramdomTime());
}

// Entre 0.5 sec et 5sec
function ramdomTime() {
    return (Math.random() + 1) * 1500;
}