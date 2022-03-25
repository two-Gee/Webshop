//Funktion um Burger in Einkaufswagen hinzuzufügen, benutzt in burger.php und burgerdetails.php
//Nutzung von Ajax, damit die Seite nicht immer neu geladen wird, wenn man ein Burger hinzufügt.
function burgerHinzufuegen(burgerID) {
    var burgerID=burgerID;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "einkaufswagenverwalten.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("burgerID="+burgerID+"&anzahl=1");
    alert("Erfolgreich zum Warenkorb hinzugefügt");
    let anzahl=parseInt(document.getElementById("anzahlsymbol").innerHTML);
    let neueAnzahl=anzahl+1;
    document.getElementById("anzahlsymbol").innerHTML=neueAnzahl;

}
//Funktion um Anzahl von den einzelnen Burgern im Einkaufswagen zu ändern
//Nutzung von Ajax, damit die Seite nicht immer neu geladen wird, wenn man ein Burger hinzufügt oder entfernt.
function anzahlAendern(id, anzahlHinzufuegen, preis) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "einkaufswagenverwalten.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("burgerID="+id+"&anzahl="+anzahlHinzufuegen);
    let anzahl=parseInt(document.getElementById(id).innerHTML);
    let gesamtpreis=parseFloat(document.getElementById("gesamtpreis").innerHTML);
    let neueAnzahl=anzahl+anzahlHinzufuegen;
    let anzahlGesamt=parseInt(document.getElementById("anzahlsymbol").innerHTML);
    let neueAnzahlGesamt=anzahlGesamt+anzahlHinzufuegen;
    document.getElementById("anzahlsymbol").innerHTML=neueAnzahlGesamt;
    if(anzahlHinzufuegen>0){
        let neuerPreis=gesamtpreis+preis;
        document.getElementById("gesamtpreis").innerHTML = neuerPreis;

    }else{
        document.getElementById("gesamtpreis").innerHTML = gesamtpreis-preis;

    }

    if(neueAnzahl<=0){
        location.reload();
    }else {
        document.getElementById(id).innerHTML = neueAnzahl;
    }
}
