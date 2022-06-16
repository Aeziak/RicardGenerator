<!DOCTYPE html>
<html>
<head>
    <title>UN PETIT RICARD MON PEQUELET ?</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta property="og:title" content="Ricard Generator" />
    <meta property="og:type" content="text" />
    <meta property="og:url" content="http://yandererp.fr/ricard/" />
    <meta property="og:image" content="http://yandererp.fr/ricard/img/logo.svg" />
</head>
<header>
    <img src="img/logo.svg" id="ricard_logo">
    <p id="catch_phrase">Générateur de phrases Ricard mon Péquélet</p>
</header>
<body>

<?php
$json = file_get_contents("verbes_lowercase.json");
$verbs = json_decode($json, true);
$pronouns = ["Je", "Tu", "", "Nous", "Vous", ""];
$appartenance = ["mon", "ton", "votre", "notre", "votre", "votre"];
$thirdPro = ["Il", "Elle", "On"];
$thirdProPlur = ["Ils", "Elles"];
$rimes = ["abeillard","antibrouillard","are","arrhe","ars","art","babillard","baléare","Baléares","bayard","bayart","béquillard","Bihar","billard","billiard","bimilliard","boïar","boïard","bouillard","boyard","braillard","briard","brouillard","Cagouillard","camoiards","candjiar","caniards","cendrillards","centiare","chevillard","chevrillard","chiard","chiare","coliart","colin-maillard","coquillard","coquillart","corbillard","corneillards","Coudehard","couillard","criard","débrouillard","décaare","déciare","douillard","Égliseneuve-des-Liards","égrillard","escarbillard","fayard","foyard","franchouillard","fuyard","gaillard","gniard","grappillard","grenouillard","guignards","hare","hart","Hayard","iyar","kandjar","kandjlar","kanglar","lahar","liard","magyar","millard","milliard","milliare","Montbéliard","montchabouillard","nasillard","nonilliard","octilliard","oeillard","oreillard","paillard","papouillard","patouillard","piaillards","pillard","pouillard","quadrilliard","quillard","quintilliard","rondouillard","savoyard","scribouillard","septilliard","sextilliard","tortillard","trilliard","trouillard","vasouillard","vétillard","vieillard"];
$inBetween = ["Pourtant", "Cependant", "Tandis que", "Du moins", "Néanmoins", "Seulement", "Or", "Évidemment", "Pendant que"];
$pronouns[2] = $thirdPro[array_rand($thirdPro)];
$pronouns[5] = $thirdProPlur[array_rand($thirdProPlur)];
$selectedPronoun = array_rand($pronouns);
$voyelles = ["a", "e", "i", "o", "u", "y", "é", "è", "ê"];
$selectedVerb = $verbs[array_rand($verbs)]["indicatif"]["présent"][$selectedPronoun];
$usedPronoun = $pronouns[$selectedPronoun] . " ";
if (in_array(mb_substr($selectedVerb, 0, 1, "UTF-8"), $voyelles)) {
    if ($selectedPronoun === 0) {
        $usedPronoun = "J'";
    }
}
$phrase = "<div id='ricard_phrase'>" . $usedPronoun . $selectedVerb . " " . $appartenance[$selectedPronoun] . " Ricard";
$selectedVerb = $verbs[array_rand($verbs)]["indicatif"]["présent"][0];
$usedPronoun = strtolower($pronouns[0]) . " ";
if (in_array(mb_substr($selectedVerb, 0, 1, "UTF-8"), $voyelles)) {
    if ($pronouns[0] === "Je") {
        $usedPronoun = "j'";
    }
}
$phrase .= "<br/>" . $inBetween[array_rand($inBetween)] . " " . $usedPronoun  . $selectedVerb . " mon " . $rimes[array_rand($rimes)] . "</div>";
echo $phrase;
?>

<footer>
    <p>Fait avec ♥ Ricard ♥ par <a href="https://twitter.com/Aeziak" target="_blank">Aeziak</a> et avec l'aide du répo Git de <a href="https://github.com/Drulac/Verbes-Francais-Conjugues" target="_blank">Drulac</a></p>
</footer>
</body>
</html>
